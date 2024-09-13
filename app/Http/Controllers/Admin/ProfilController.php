<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\CodeQR;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $roles = metaData();
        $data = [
            'pages' => Str::upper(' Master'),
            'roles' => $roles,
        ];
        return view('admin.settingan.profil', $data);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed',
        ]);
        $roles = metaData();
        $admin = Admin::where('username', $roles['username'])->first();

        if (!$admin || !Hash::check($request->password_old, $admin->password)) {
            return back()->withErrors(['password_old' => 'Password lama tidak sesuai.']);
        }
        $admin->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
