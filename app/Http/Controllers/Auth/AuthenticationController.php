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
use App\Models\Guru;
use App\Models\Wali;
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

    // User Authentication
    public function postSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!$request->longitude || !$request->latitude) {
            return redirect()->back()->with('error', 'Izin masuk tidak diperbolehkan, anda melakukan kesalahan sistem');
        }
        if (!$request->unique_meta) {
            return redirect()->back()->with('error', 'Browser tidak dapat menditeksi device anda.');
        }

        $siswa = Siswa::where('nisn', $request->username)
            ->orWhere('nik', $request->username)
            ->first();

        if ($siswa) {
            $sekolah = Sekolah::lembagaBy($siswa->sekolah_id);
            if ($sekolah->status == 'NON ACTIVE') {
                return redirect()->back()->with('info', 'Sekolah sedang dinonaktifkan !!.');
            }
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
                    if ($metaSiswa->lock_device != $request->unique_meta) {
                        return redirect()->back()->with('error', 'Gunakan device yang pertama kali digunakan login.');
                    }
                    $metaSiswa->update([
                        'meta' => json_encode($meta),
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                    ]);
                } else {
                    $metaSiswa = MetaSiswa::create([
                        'siswa_id' => $siswa->id,
                        'meta' => json_encode($meta),
                        'lock_device' => $request->unique_meta,
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                    ]);
                }

                $lembaga = Sekolah::where('id', $siswa->sekolah_id)->first();
                // Store session data
                $session = [
                    'username' => $siswa->id,
                    'roles' => 'SISWA',
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

    public function postWali(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $wali = Wali::where('no_hp', $request->username)->first();
        if (!$wali) {
            return redirect()
                ->back()
                ->withErrors([
                    'username' => 'Username tidak ditemukan.',
                ])
                ->onlyInput('username');
        }
        $siswa = Siswa::find($wali->siswa_id);

        if ($siswa && $wali) {
            $sekolah = Sekolah::lembagaBy($siswa->sekolah_id);
            if ($sekolah->status == 'NON ACTIVE') {
                return redirect()->back()->with('info', 'Sekolah sedang dinonaktifkan !!.');
            }
            if (Auth::guard('wali')->attempt(['no_hp' => $request->username, 'password' => $request->password])) {
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

                $lembaga = Sekolah::where('id', $siswa->sekolah_id)->first();
                // Store session data
                $session = [
                    'username' => $siswa->id,
                    'roles' => 'SISWA',
                    'wali' => true,
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

    public function postGuru(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $guru = Guru::where('nik_nip', $request->username)->first();

        if ($guru) {
            $credentials = [
                'password' => $request->password,
            ];

            if ($guru->nik_nip === $request->username) {
                $credentials['nik_nip'] = $request->username;
            }

            if (Auth::guard('guru')->attempt($credentials)) {
                $lembaga = Sekolah::where('id', $guru->sekolah_id)->first();
                // Store session data
                $session = [
                    'username' => $guru->id,
                    'roles' => 'GURU',
                    'lembaga' => $lembaga->nsm,
                ];

                $request->session()->put('meta_data', $session);

                // Redirect to the user dashboard
                return redirect('/guru');
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

    public function logout(Request $request)
    {
        $meta = metaData();
        if (count($meta) == 0) {
            return redirect('/')->with('seccess', 'Tidak ada akses masuk untuk anda.');
        }
        $roles = $meta['roles'];
        if ($roles == 'MASTER') {
            Auth::guard('admin')->logout();
        } elseif ($roles == 'GURU') {
            Auth::guard('guru')->logout();
        } elseif ($roles == 'SISWA') {
            Auth::guard('siswa')->logout();
        } else {
            Auth::guard('wali')->logout();
        }
        $request->session()->flush();
        $request->session()->regenerate();
        if ($roles == 'MASTER') {
            $path = '/admin';
        } else {
            $path = '/';
        }
        return redirect($path)->with('seccess', 'Berhasil keluar dari sistem.');
    }
}
