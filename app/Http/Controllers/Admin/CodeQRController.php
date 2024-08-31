<?php

namespace App\Http\Controllers\Admin;

use App\Models\CodeQR;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CodeQRController extends Controller
{
    public function index()
    {
        $lembaga = Sekolah::isLembaga();
        $data = [
            'pages' => Str::upper('Code Qr ' . $lembaga->nama),
            'lembaga' => $lembaga,
        ];
        return view('admin.settingan.password_qr', $data);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $lembaga = Sekolah::isLembaga();

        $codeQR = CodeQR::where('sekolah_id', $lembaga->id)->first();

        if (!$codeQR || !Hash::check($request->password_old, $codeQR->password)) {
            return back()->withErrors(['password_old' => 'Password lama tidak sesuai.']);
        }
        $codeQR->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
