<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mesin;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MesinController extends Controller
{
    public function index()
    {
        $lembaga = Sekolah::isLembaga();
        $data = [
            'pages' => Str::upper('Setting Mesin  ' . $lembaga->nama),
            'lembaga' => $lembaga,
        ];
        return view('admin.settingan.password_mesin', $data);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $lembaga = Sekolah::isLembaga();

        $mesin = Mesin::where('sekolah_id', $lembaga->id)->first();

        if (!$mesin || !Hash::check($request->password_old, $mesin->password)) {
            return back()->withErrors(['password_old' => 'Password lama tidak sesuai.']);
        }
        $mesin->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
