<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPiketGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function beranda()
    {
        $guru = Auth::guard('guru')->user();
        $jadwal_piket = JadwalPiketGuru::where('guru_id', $guru->id)->get();
        $data = [
            'pages' => 'Beranda',
            'guru' => $guru,
            'jadwal_piket' => $jadwal_piket,
        ];

        return view('guru.beranda', $data);
    }
}
