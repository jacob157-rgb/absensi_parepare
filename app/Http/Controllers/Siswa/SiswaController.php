<?php

namespace App\Http\Controllers\Siswa;

use Carbon\Carbon;
use App\Models\Izin;
use App\Models\Siswa;
use App\Models\JamAbsen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function beranda()
    {
        $siswa = Siswa::authSiswa();
        $hariIni = strtoupper(Carbon::now()->locale('id')->dayName);
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)
            ->where('hari', $hariIni)
            ->first();

        $data = [
            'pages' => 'Beranda',
            'siswa' => $siswa,
            'jam_absen' => $jam_absen,
        ];

        return view('siswa.beranda', $data);
    }
    public function absen()
    {
        $siswa = Siswa::authSiswa();
        $hariIni = strtoupper(Carbon::now()->locale('id')->dayName);
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)
            ->where('hari', $hariIni)
            ->first();

        $data = [
            'pages' => 'Absensi',
            'siswa' => $siswa,
            'jam_absen' => $jam_absen,
        ];

        return view('siswa.absen', $data);
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
