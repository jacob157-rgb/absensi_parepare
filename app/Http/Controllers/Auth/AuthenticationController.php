<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\MetaSiswa;
use Illuminate\Support\Str;
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

    // User Authentication
    public function getUser()
    {
        if (metaData()) {
            return redirect('/home');
        }
        return view('auth.user.login');
    }

    public function postSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!$request->longitude || !$request->latitude) {
            return redirect()->back()->with('error', 'Izin masuk tidak diperbolehkan, anda melakukan kesalahan sistem');
        }

        $siswa = Siswa::where('nisn', $request->username)
            ->orWhere('nik', $request->username)
            ->first();

        if ($siswa) {
            $credentials = [
                'password' => $request->password,
            ];

            if ($siswa->nisn === $request->username) {
                $credentials['nisn'] = $request->username;
            } else {
                $credentials['nik'] = $request->username;
            }

            if (Auth::guard('siswa')->attempt($credentials)) {
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
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ];

                $metaSiswa = MetaSiswa::where('siswa_id', $siswa->id)->first();

                if ($metaSiswa) {
                    $metaSiswa->update([
                        'meta' => json_encode($meta),
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                    ]);
                } else {
                    $metaSiswa = MetaSiswa::create([
                        'siswa_id' => $siswa->id,
                        'meta' => json_encode($meta),
                        'lock_device' => Str::random(10),
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                    ]);
                }

                $lembaga = Sekolah::where('id', $siswa->sekolah_id)->first();
                // Store session data
                $session = [
                    'username' => $siswa->username,
                    'roles' => "SISWA-{$metaSiswa->lock_device}",
                    'meta' => $meta,
                    'lembaga' => $lembaga->nsm,
                ];

                $request->session()->put('meta_data', $session);

                // Redirect to the user dashboard
                return redirect('/siswa');
            }
        }

        // Handle authentication failure
        return redirect()
            ->back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->onlyInput('username');
    }

    public function logoutUser(Request $request)
    {
        $request->session()->flush();
        Auth::guard('admin')->logout();
        $request->session()->regenerate();
        return redirect('/admin')->with('seccess', 'Berhasil keluar dari sistem.');
    }
}
