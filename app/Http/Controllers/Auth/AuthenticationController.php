<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    // Admin Authentication

    public function getAdmin()
    {
        if (metaData()) {
            return redirect('/admin/beranda');
        }
        return view('auth.admin.login');
    }

    public function postAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Auth::guard('admin')->attempt($credentials)) {
            $agent = new Agent();
            $agent->setUserAgent($request->userAgent());
            $meta = [
                'browser' => $agent->browser(),
                'browser_version' => $agent->version($agent->browser()),
                'device' => $agent->device(),
                'platform' => $agent->platform(),
                'ip' => $request->ip(),
                'waktu' => now()->toDateTimeString(),
                'is_mobile' => $agent->isMobile(),
                'is_tablet' => $agent->isTablet(),
                'is_desktop' => $agent->isDesktop(),
                'is_robot' => $agent->isRobot(),
                'is_bot' => $agent->isBot(),
            ];
            $admin->update([
                'meta' => $meta,
            ]);
            $session = [
                'username' => $admin->username,
                'roles' => $admin->roles,
                'meta' => $meta,
            ];
            $request->session()->put('meta_data', $session);
            return redirect('/admin/beranda');
        }
        return redirect()
            ->back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->onlyInput('username');
    }

    public function logoutAdmin(Request $request)
    {
        $request->session()->flush();
        Auth::guard('admin')->logout();
        $request->session()->regenerate();
        return redirect('/admin')->with('seccess', 'Berhasil keluar dari sistem.');
    }
}
