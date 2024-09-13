<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use App\Models\Izin;
use App\Models\Kelas;
use App\Models\Mesin;
use App\Models\Siswa;
use App\Models\CodeQR;
use App\Models\Absensi;
use App\Models\Sekolah;
use App\Models\JamAbsen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JadwalPiketGuru;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuruController extends Controller
{
    public function beranda()
    {
        $guru = Auth::guard('guru')->user();
        $jadwal_piket = JadwalPiketGuru::where('guru_id', $guru->id)->get();
        $hariIni = strtoupper(Carbon::now()->locale('id')->dayName);
        $jam_absen = JamAbsen::where('sekolah_id', $guru->sekolah_id)
            ->where('hari', $hariIni)
            ->first();

        $status_absen = $jadwal_piket->contains(function ($jadwal) use ($hariIni) {
            return strtoupper($jadwal->hari) === $hariIni;
        });

        $data = [
            'pages' => 'Beranda',
            'guru' => $guru,
            'jadwal_piket' => $jadwal_piket,
            'jam_absen' => $jam_absen,
            'status_absen' => $status_absen,
        ];
        return view('guru.beranda', $data);
    }

    //CONTROLLER ABSEN

    public function getAbsenManual(Request $request)
    {
        $guru = Auth::guard('guru')->user();
        $jam_absen = JamAbsen::where('sekolah_id', $guru->sekolah_id)
            ->get()
            ->keyBy('hari');
        $data = [
            'guru_id' => $guru->id,
            'tanggalAbsen' => now()->format('Y-m-d'),
            'jam_absen' => $jam_absen,
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
            'siswa' => Siswa::orderBy('id', 'desc')
                ->where('sekolah_id', $guru->sekolah_id)
                ->where('kelas_id', $request->query('kelas'))
                ->get(),
        ];

        return view('guru.absensi_manual', $data);
    }

    public function storeAbsen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'guru_id' => 'required|exists:guru,id',
            'sekolah_id' => 'required',
        ]);

        $siswa = Siswa::where('nik', $request->nik)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        $tanggalAbsen = now();

        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->exists();

        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Siswa sudah melakukan absensi hari ini.');
        }

        Absensi::create([
            'siswa_id' => $siswa->id,
            'guru_id' => $request->guru_id,
            'sekolah_id' => $request->sekolah_id,
            'pengabsen' => 'GURU',
            'tanggal_absen' => $tanggalAbsen,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil absen.');
    }

    public function showAbsen(Request $request)
    {
        $startDate = $request->query('sd');
        $endDate = $request->query('ed');

        $guru = Auth::guard('guru')->user();
        $jam_absen = JamAbsen::where('sekolah_id', $guru->sekolah_id)
            ->get()
            ->keyBy('hari');

        $tanggalAbsen = now();

        if (!$startDate && !$endDate) {
            $showAbsensi = Absensi::where('guru_id', $guru->id)
                ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
                ->get();
        } else {
            $showAbsensi = Absensi::where('guru_id', $guru->id)
                ->whereBetween('tanggal_absen', [$startDate, $endDate])
                ->get();
        }

        $data = [
            'guru_id' => $guru->id,
            'jam_absen' => $jam_absen,
            'showAbsensi' => $showAbsensi,
        ];

        return view('guru.detail_absensi', $data);
    }

    public function postAbsenManual(Request $request)
    {
        // Validasi input
        $request->validate([
            'siswa_ids' => 'required|array',
            'siswa_ids.*' => 'exists:siswa,id',
            'status' => 'required|in:H,TH,I',
        ]);

        $tanggalAbsen = now();
        $guru = Auth::guard('guru')->user();
        foreach ($request->siswa_ids as $siswaId) {
            $siswa = Siswa::find($siswaId);

            if ($siswa) {
                $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
                    ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
                    ->first();

                $existingIzin = Izin::where('siswa_id', $siswa->id)
                    ->whereDate('tanggal_mulai', $tanggalAbsen->toDateString())
                    ->first();

                // Logika Hadir
                if ($request->status == 'H') {
                    if ($existingIzin) {
                        // Jika siswa sudah izin, hapus izin dan buat absensi hadir
                        $existingIzin->delete();
                    }

                    if (!$existingAbsensi) {
                        // Jika belum ada absensi, buat baru
                        Absensi::create([
                            'siswa_id' => $siswa->id,
                            'guru_id' => Auth::guard('guru')->user()->id,
                            'sekolah_id' => Auth::guard('guru')->user()->sekolah_id,
                            'pengabsen' => 'GURU',
                            'tanggal_absen' => $tanggalAbsen,
                        ]);
                    } elseif ($existingAbsensi) {
                        // Hapus absensi sebelumnya dan buat ulang
                        $existingAbsensi->delete();
                        Absensi::create([
                            'siswa_id' => $siswa->id,
                            'guru_id' => Auth::guard('guru')->user()->id,
                            'sekolah_id' => Auth::guard('guru')->user()->sekolah_id,
                            'pengabsen' => 'GURU',
                            'tanggal_absen' => $tanggalAbsen,
                        ]);
                    }
                }

                // Logika Tidak Hadir
                if ($request->status == 'TH') {
                    if ($existingIzin) {
                        // Jika siswa sudah izin, hapus izin
                        $existingIzin->delete();
                    }

                    if ($existingAbsensi) {
                        // Hapus absensi jika ada
                        $existingAbsensi->delete();
                    }
                }

                // Logika Izin
                if ($request->status == 'I') {
                    if (!$existingAbsensi && !$existingIzin) {
                        // Buat entri izin baru
                        Izin::create([
                            'kelas_id' => $request->kelas_id,
                            'siswa_id' => $siswa->id,
                            'kategori' => Str::upper("GURU $guru->nama YANG MENGIZINKAN"),
                            'tanggal_mulai' => $tanggalAbsen,
                            'tanggal_selesai' => $tanggalAbsen,
                            'surat_keterangan' => '-',
                            'status' => 'DISETUJUI',
                        ]);
                    } elseif ($existingAbsensi) {
                        // Hapus absensi dan buat izin
                        $existingAbsensi->delete();
                        Izin::create([
                            'kelas_id' => $request->kelas_id,
                            'siswa_id' => $siswa->id,
                            'kategori' => Str::upper("GURU $guru->nama YANG MENGIZINKAN"),
                            'tanggal_mulai' => $tanggalAbsen,
                            'tanggal_selesai' => $tanggalAbsen,
                            'surat_keterangan' => '-',
                            'status' => 'DISETUJUI',
                        ]);
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'datas' => $request->all(),
        ]);
    }

    //CONTROLLER CODE QR

    public function codeqrIndex()
    {
        $guru = Auth::guard('guru')->user();

        $lembaga = CodeQR::where('sekolah_id', $guru->sekolah_id)->first();
        $data = [
            'code_unique' => $lembaga->code_unique,
            'guru_id' => $guru->id,
        ];
        $qrCodeAuthenticated = Session::get('qr_code');
        if ($qrCodeAuthenticated == true) {
            return redirect('/guru/code_qr');
        }
        $data = [
            'pages' => 'Code QR',
            'guru' => $guru,
            'lembaga' => $lembaga,
        ];
        return view('guru.qrcode.index', $data);
    }
    public function codeqrPost(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|string',
        ]);

        $guru = Auth::guard('guru')->user();

        $codeQR = CodeQR::where('sekolah_id', $guru->sekolah_id)->first();

        if (!$codeQR) {
            return redirect()->back()->with('error', 'QR code not found for this school');
        }

        if (!Hash::check($request->password, $codeQR->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        Session::put('qr_code', true);
        return redirect('/guru/code_qr');
    }

    public function code_qr()
    {
        $guru = Auth::guard('guru')->user();

        $lembaga = CodeQR::where('sekolah_id', $guru->sekolah_id)->first();
        $data = [
            'code_unique' => $lembaga->code_unique,
            'guru_id' => $guru->id,
        ];

        $qrCode = QrCode::size(400)->generate(json_encode($data));
        $qrCodeAuthenticated = Session::get('qr_code');
        if (!$qrCodeAuthenticated) {
            return redirect('/guru');
        }
        $data = [
            'pages' => 'Code QR',
            'guru' => $guru,
            'qrCode' => $qrCode,
            'lembaga' => $lembaga,
            'sekolah' => Sekolah::lembagaBy($guru->sekolah_id),
        ];
        return view('guru.qrcode.code_qr', $data);
    }
    public function postQrResponse(Request $request)
    {
        $guru = Auth::guard('guru')->user();
        $lembaga = CodeQR::where('sekolah_id', $guru->sekolah_id)->first();
        $lembaga->update([
            'code_unique' => $request->code_unique,
        ]);

        return response()->json(
            [
                'success' => true,
                'data' => $request->all(),
            ],
            201,
        );
    }
    //CONTROLLER MESIN

    public function codeMesinIndex()
    {
        $guru = Auth::guard('guru')->user();

        $lembaga = Mesin::where('sekolah_id', $guru->sekolah_id)->first();
        $data = [
            'code_unique' => $lembaga->code_unique,
            'guru_id' => $guru->id,
        ];
        $qrCodeAuthenticated = Session::get('mesin');
        if ($qrCodeAuthenticated == true) {
            return redirect('/guru/mesin');
        }
        $data = [
            'pages' => 'Mesin',
            'guru' => $guru,
            'lembaga' => $lembaga,
        ];
        return view('guru.mesin.index', $data);
    }
    public function codeMesinPost(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|string',
        ]);

        $guru = Auth::guard('guru')->user();

        $mesin = Mesin::where('sekolah_id', $guru->sekolah_id)->first();

        if (!$mesin) {
            return redirect()->back()->with('error', 'Mesin not found for this school');
        }

        if (!Hash::check($request->password, $mesin->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        Session::put('mesin', true);
        return redirect('/guru/mesin');
    }

    public function mesin()
    {
        $guru = Auth::guard('guru')->user();

        $lembaga = Mesin::where('sekolah_id', $guru->sekolah_id)->first();

        $qrCodeAuthenticated = Session::get('mesin');
        if (!$qrCodeAuthenticated) {
            return redirect('/guru');
        }
        $tanggalAbsen = now();
        $showAbsensi = Absensi::where('guru_id', $guru->id)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->get();
        $data = [
            'pages' => 'Mesin',
            'guru' => $guru,
            'sekolah' => Sekolah::lembagaBy($guru->sekolah_id),
            'lembaga' => $lembaga,
            'showAbsensi' => $showAbsensi,
        ];
        return view('guru.mesin.mesin', $data);
    }
}
