<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JamAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SiswaController extends Controller
{
    public function beranda()
    {
        $siswa = Auth::guard('siswa')->user();
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
}
