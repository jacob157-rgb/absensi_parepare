<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPiketGuru;
use App\Models\JamAbsen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'status_absen' => $status_absen
        ];
        return view('guru.beranda', $data);
    }
}
