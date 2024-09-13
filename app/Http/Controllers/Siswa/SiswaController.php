<?php

namespace App\Http\Controllers\Siswa;

use Carbon\Carbon;
use App\Models\Izin;
use App\Models\Siswa;
use App\Models\CodeQR;
use App\Models\Absensi;
use App\Models\Sekolah;
use App\Models\JamAbsen;
use App\Models\MetaSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SiswaController extends Controller
{
    public function beranda()
    {
        $siswa = Siswa::authSiswa();
        $tanggalAbsen = now();
        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->first();

        $hariIni = strtoupper(Carbon::now()->locale('id')->dayName);
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)
            ->where('hari', $hariIni)
            ->first();

        $data = [
            'pages' => 'Beranda',
            'siswa' => $siswa,
            'jam_absen' => $jam_absen,
            'existingAbsensi' => $existingAbsensi?->exists(),
            'jamAbsen' => $existingAbsensi,
        ];

        return view('siswa.beranda', $data);
    }

    // CONTROLLER ABSENSI
    public function absen()
    {
        $siswa = Siswa::authSiswa();
        $lembaga = Sekolah::lembagaBy($siswa->sekolah_id);
        $hariIni = strtoupper(Carbon::now()->locale('id')->dayName);
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)
            ->where('hari', $hariIni)
            ->first();
        $qrCode = QrCode::size(300)->generate($siswa->nik);

        $tanggalAbsen = now();
        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->exists();

        $data = [
            'pages' => 'Absensi',
            'siswa' => $siswa,
            'meta_siswa' => MetaSiswa::where('siswa_id', $siswa->id)->first(),
            'jam_absen' => $jam_absen,
            'lembaga' => $lembaga,
            'qrCode' => $qrCode,
            'existingAbsensi' => $existingAbsensi,
        ];
        return view('siswa.absen', $data);
    }
    public function detail_absensi(Request $request)
    {
        $startDate = $request->query('sd') ? Carbon::parse($request->query('sd')) : now()->startOfMonth();
        $endDate = $request->query('ed') ? Carbon::parse($request->query('ed')) : now()->endOfMonth();

        $siswa = Siswa::authSiswa();
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)->get()->keyBy('hari');

        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereBetween('tanggal_absen', [$startDate, $endDate])
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->tanggal_absen)->format('Y-m-d');
            });

        // Generate an array of dates
        $dates = [];
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->toDateString();
        }

        $data = [
            'pages' => 'Detail Absensi',
            'siswa' => $siswa,
            'existingAbsensi' => $existingAbsensi,
            'dates' => $dates,
            'jam_absen' => $jam_absen,
        ];

        return view('siswa.detail_absensi', $data);
    }


    public function storeAbsen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'code_unique' => 'required',
            'guru_id' => 'required|exists:guru,id',
        ]);

        $siswa = Siswa::where('nik', $request->nik)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        $lembaga = CodeQR::where('code_unique', $request->code_unique)->first();
        if (!$lembaga) {
            return redirect()->back()->with('error', 'Gagal absen lakukan lagi.');
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
            'tanggal_absen' => $tanggalAbsen,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil absen.');
    }

    public function location(Request $request)
    {
        $siswa = Siswa::authSiswa();
        $meta_siswa = MetaSiswa::where('siswa_id', $siswa->id)->first();
        $meta_siswa->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil diupdate menjadi yang terbaru.');
    }
    // CONTROLLER PERIZINAN

    public function perizinan()
    {
        $siswa = Siswa::authSiswa();
        $perizinan = Izin::where('siswa_id', $siswa->id)->paginate(10);
        $data = [
            'pages' => 'Perizinan',
            'siswa' => $siswa,
            'perizinan' => $perizinan,
        ];

        return view('siswa.izin.index', $data);
    }
    public function perizinanCreate()
    {
        $siswa = Siswa::authSiswa();
        $perizinan = Izin::where('siswa_id', $siswa->id)->paginate(10);
        $data = [
            'pages' => 'Perizinan',
            'siswa' => $siswa,
            'perizinan' => $perizinan,
        ];

        return view('siswa.izin.create', $data);
    }

    public function perizinanStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'surat_keterangan' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        // Proses upload file
        if ($request->hasFile('surat_keterangan')) {
            $fileName = Str::random(10) . '.' . $request->file('surat_keterangan')->getClientOriginalExtension();
            $request->file('surat_keterangan')->storeAs('perizinan', $fileName, 'public');
        }

        $siswa = Siswa::authSiswa();
        izin::create([
            'kelas_id' => $siswa->kelas_id,
            'siswa_id' => $siswa->id,
            'kategori' => $request->kategori,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_keterangan' => $fileName,
            'status' => 'MENUNGGU',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.perizinan')->with('success', 'Perizinan berhasil dibuat.');
    }

    public function perizinanEdit($id)
    {
        $siswa = Siswa::authSiswa();
        $perizinan = Izin::find($id);
        $data = [
            'pages' => 'Perizinan',
            'siswa' => $siswa,
            'perizinan' => $perizinan,
        ];

        return view('siswa.izin.edit', $data);
    }

    public function perizinanUpdate(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'surat_keterangan' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $izin = Izin::findOrFail($id);

        if ($request->hasFile('surat_keterangan')) {
            if ($izin->surat_keterangan && Storage::disk('public')->exists('perizinan/' . $izin->surat_keterangan)) {
                Storage::disk('public')->delete('perizinan/' . $izin->surat_keterangan);
            }

            $fileName = Str::random(10) . '.' . $request->file('surat_keterangan')->getClientOriginalExtension();
            $request->file('surat_keterangan')->storeAs('perizinan', $fileName, 'public');

            $izin->surat_keterangan = $fileName;
        }

        // Update data izin
        $izin->update([
            'kategori' => $request->kategori,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('siswa.perizinan')->with('success', 'Perizinan berhasil diperbarui.');
    }

    public function perizinanAlasan($id)
    {
        return response()->json([
            'success' => true,
            'izin' => Izin::find($id),
        ]);
    }

    public function perizinanDestroy(string $id)
    {
        $izin = Izin::find($id);
        $izin->delete();
        return redirect()->back()->with('success', 'Perizinan berhasil dihapus.');
    }

    // CONTROLLER LIVE
    public function live()
    {
        $siswa = Siswa::authSiswa();

        $live = $siswa?->kelas?->live;
        if ($live) {
            $dom = new \DOMDocument();
            @$dom->loadHTML($live);
            $iframe = $dom->getElementsByTagName('iframe')->item(0);
            if ($iframe) {
                $iframe->setAttribute('id', 'youtubeIframe');
                $live = $dom->saveHTML($iframe);
            }
        }

        $data = [
            'pages' => 'Live Youtube',
            'siswa' => $siswa,
            'live' => $live,
        ];

        return view('siswa.live', $data);
    }
}
