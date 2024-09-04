<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\JamAbsen;
use Illuminate\Http\Request;
use App\Models\JadwalPiketGuru;
use App\Http\Controllers\Controller;
use App\Models\CodeQR;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
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

    public function storeAbsen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'guru_id' => 'required|exists:guru,id',
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
            'tanggal_absen' => $tanggalAbsen,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil absen.');
    }

    //CONTROLLER CODE QR

    public function code_qr()
    {
        $guru = Auth::guard('guru')->user();

        $lembaga = CodeQR::where('sekolah_id', $guru->sekolah_id)->first();
        $data = [
            'code_unique' => $lembaga->code_unique,
            'guru_id' => $guru->id,
        ];

        $qrCode = QrCode::size(500)->generate(json_encode($data));

        $data = [
            'pages' => 'Code QR',
            'guru' => $guru,
            'qrCode' => $qrCode,
            'lembaga' => $lembaga,
        ];
        return view('guru.code_qr', $data);
    }
}
