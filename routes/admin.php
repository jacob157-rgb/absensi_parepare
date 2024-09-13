<?php

use App\Models\Guru;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Support\Carbon;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\IzinController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MesinController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\CodeQRController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\LembagaController;
use App\Http\Controllers\Admin\JamAbsenController;
use App\Http\Controllers\Admin\JamKerjaController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\JadwalPiketGuruController;
use App\Http\Controllers\Admin\KalenderAkademikConttroller;
use App\Models\JadwalPiketGuru;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([isAdmin::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/beranda', function () {
            $roles = metaData();
            if($roles['roles'] == 'MASTER') {
                $data = [
                    'pages' => 'Beranda',
                    'siswa' => Siswa::count(),
                    'guru' => Guru::count(),
                    'admin' => Admin::count(),
                    'sekolah' => Sekolah::all(),
                ];
            } else {
                $lembaga = Sekolah::isLembaga();
                $hari = strtoupper(Carbon::now()->locale('id')->dayName);
                $jadwalGuru = JadwalPiketGuru::where('hari', $hari)->get();
                $data = [
                    'pages' => 'Beranda',
                    'jadwal_guru' => $jadwalGuru,
                    'siswa' => Siswa::where('sekolah_id', $lembaga->id)->count(),
                    'guru' => Guru::where('sekolah_id', $lembaga->id)->count(),
                ];
            }
            return view('admin.beranda', $data);
        })->name('beranda')->middleware(['permission:MASTER,LEMBAGA']);
        Route::controller(TahunAjaranController::class)->group(function () {
            Route::get('/tahun_ajaran', 'index')->name('tahun_ajaran.index')->middleware(['permission:MASTER']);
            Route::post('/tahun_ajaran', 'store')->name('tahun_ajaran.store')->middleware(['permission:MASTER']);
            Route::get('/tahun_ajaran/{id}', 'edit')->name('tahun_ajaran.edit')->middleware(['permission:MASTER']);
            Route::post('/tahun_ajaran/{id}', 'update')->name('tahun_ajaran.update')->middleware(['permission:MASTER']);
            Route::delete('/tahun_ajaran/{id}/destroy', 'destroy')->name('tahun_ajaran.destroy')->middleware(['permission:MASTER']);
        });
        Route::controller(SemesterController::class)->group(function () {
            Route::get('/semester', 'index')->name('semester.index')->middleware(['permission:MASTER']);
            Route::post('/semester', 'store')->name('semester.store')->middleware(['permission:MASTER']);
            Route::get('/semester/{id}', 'edit')->name('semester.edit')->middleware(['permission:MASTER']);
            Route::post('/semester/{id}', 'update')->name('semester.update')->middleware(['permission:MASTER']);
            Route::delete('/semester/{id}/destroy', 'destroy')->name('semester.destroy')->middleware(['permission:MASTER']);
        });
        Route::controller(LembagaController::class)->group(function () {
            Route::get('/lembaga', 'index')->name('lembaga.index')->middleware(['permission:MASTER,LEMBAGA']);
            Route::get('/lembaga/create', 'create')->name('lembaga.create')->middleware(['permission:MASTER']);
            Route::post('/lembaga', 'store')->name('lembaga.store')->middleware(['permission:MASTER']);
            Route::get('/lembaga/{id}', 'edit')->name('lembaga.edit')->middleware(['permission:MASTER']);
            Route::get('/lembaga/{id}/show', 'show')->name('lembaga.show')->middleware(['permission:MASTER']);
            Route::post('/lembaga/{id}', 'update')->name('lembaga.update')->middleware(['permission:MASTER']);
            Route::post('/kamad/{id}', 'updateKamad')->name('kamad.update')->middleware(['permission:LEMBAGA']);
            Route::delete('/lembaga/{id}/destroy', 'destroy')->name('lembaga.destroy')->middleware(['permission:MASTER']);
        });
        Route::controller(JamKerjaController::class)->group(function () {
            Route::get('/jam_kerja', 'index')->name('jam_kerja.index')->middleware(['permission:MASTER']);
            Route::get('/jam_kerja/create', 'create')->name('jam_kerja.create')->middleware(['permission:MASTER']);
            Route::post('/jam_kerja', 'store')->name('jam_kerja.store')->middleware(['permission:MASTER']);
            Route::get('/jam_kerja/{id}', 'edit')->name('jam_kerja.edit')->middleware(['permission:MASTER']);
            Route::post('/jam_kerja/{id}', 'update')->name('jam_kerja.update')->middleware(['permission:MASTER']);
            Route::delete('/jam_kerja/{id}/destroy', 'destroy')->name('jam_kerja.destroy')->middleware(['permission:MASTER']);
        });
        Route::controller(JamAbsenController::class)->group(function () {
            Route::get('/jam_absen', 'index')->name('jam_absen.index')->middleware(['permission:LEMBAGA']);
            Route::post('/jam_absen', 'update')->name('jam_absen.update')->middleware(['permission:LEMBAGA']);
        });
        Route::controller(KalenderAkademikConttroller::class)->group(function () {
            Route::get('/kalender_akademik', 'index')->name('kalender_akademik.index')->middleware(['permission:MASTER']);
            Route::get('/kalender_akademik/create', 'create')->name('kalender_akademik.create')->middleware(['permission:MASTER']);
            Route::post('/kalender_akademik', 'store')->name('kalender_akademik.store')->middleware(['permission:MASTER']);
            Route::get('/kalender_akademik/{id}', 'edit')->name('kalender_akademik.edit')->middleware(['permission:MASTER']);
            Route::post('/kalender_akademik/{id}', 'update')->name('kalender_akademik.update')->middleware(['permission:MASTER']);
            Route::delete('/kalender_akademik/{id}/destroy', 'destroy')->name('kalender_akademik.destroy')->middleware(['permission:MASTER']);
        });
        Route::controller(KelasController::class)->group(function () {
            Route::get('/kelas', 'index')->name('kelas.index')->middleware(['permission:LEMBAGA']);
            Route::get('/kelas/create', 'create')->name('kelas.create')->middleware(['permission:LEMBAGA']);
            Route::post('/kelas', 'store')->name('kelas.store')->middleware(['permission:LEMBAGA']);
            Route::get('/kelas/{id}', 'edit')->name('kelas.edit')->middleware(['permission:LEMBAGA']);
            Route::post('/kelas/{id}', 'update')->name('kelas.update')->middleware(['permission:LEMBAGA']);
            Route::delete('/kelas/{id}/destroy', 'destroy')->name('kelas.destroy')->middleware(['permission:LEMBAGA']);
        });
        Route::controller(GuruController::class)->group(function () {
            Route::get('/guru', 'index')->name('guru.index')->middleware(['permission:LEMBAGA']);
            Route::post('/guru/importExcel', 'importExcel')->name('guru.importExcel')->middleware(['permission:LEMBAGA']);
            Route::post('/guru', 'store')->name('guru.store')->middleware(['permission:LEMBAGA']);
            Route::get('/guru/{id}', 'edit')->name('guru.edit')->middleware(['permission:LEMBAGA']);
            Route::post('/guru/{id}', 'update')->name('guru.update')->middleware(['permission:LEMBAGA']);
            Route::delete('/guru/{id}/destroy', 'destroy')->name('guru.destroy')->middleware(['permission:LEMBAGA']);
        });
        Route::controller(SiswaController::class)->group(function () {
            Route::get('/siswa', 'index')->name('siswa.index')->middleware(['permission:LEMBAGA']);
            Route::get('/siswa/create', 'create')->name('siswa.create')->middleware(['permission:LEMBAGA']);
            Route::post('/siswa/importExcel', 'importExcel')->name('siswa.importExcel')->middleware(['permission:LEMBAGA']);
            Route::post('/siswa', 'store')->name('siswa.store')->middleware(['permission:LEMBAGA']);
            Route::get('/siswa/{id}', 'edit')->name('siswa.edit')->middleware(['permission:LEMBAGA']);
            Route::get('/siswa/{id}/show', 'show')->name('siswa.show')->middleware(['permission:LEMBAGA']);
            Route::post('/siswa/{id}', 'update')->name('siswa.update')->middleware(['permission:LEMBAGA']);
            Route::get('/siswa/migrasi/kelas', 'getMigrasi')->name('siswa.getMigrasi')->middleware(['permission:LEMBAGA']);
            Route::post('/siswa/migrasi/kelas', 'postMigrasi')->name('siswa.postMigrasi')->middleware(['permission:LEMBAGA']);

            Route::get('/siswa/migrasi/lock_device', 'lockDevice')->name('siswa.lockDevice')->middleware(['permission:LEMBAGA']);
            Route::delete('/siswa/migrasi/lock_device/{id}', 'destroyLockDevice')->name('siswa.destroyLockDevice')->middleware(['permission:LEMBAGA']);


            Route::delete('/siswa/{id}/destroy', 'destroy')->name('siswa.destroy')->middleware(['permission:LEMBAGA']);
        });

        Route::controller(JadwalPiketGuruController::class)->group(function () {
            Route::get('/jadwal_piket_guru', 'index')->name('jadwal_piket_guru.index')->middleware(['permission:LEMBAGA']);
            Route::post('/jadwal_piket_guru', 'store')->name('jadwal_piket_guru.store')->middleware(['permission:LEMBAGA']);
            Route::post('/jadwal_piket_guru/{id}', 'update')->name('jadwal_piket_guru.update')->middleware(['permission:LEMBAGA']);
            Route::delete('/jadwal_piket_guru/{id}/destroy', 'destroy')->name('jadwal_piket_guru.destroy')->middleware(['permission:LEMBAGA']);
        });

        Route::controller(IzinController::class)->group(function () {
            Route::get('/perizinan', 'index')->name('perizinan.index')->middleware(['permission:LEMBAGA']);
            Route::get('/perizinan/create', 'create')->name('perizinan.create')->middleware(['permission:LEMBAGA']);
            Route::get('/perizinan/get/{id_kelas}', 'getSiswa')->name('perizinan.getSiswa')->middleware(['permission:LEMBAGA']);
            Route::post('/perizinan/approved/{id}', 'getApproved')->name('perizinan.getApproved')->middleware(['permission:LEMBAGA']);
            Route::post('/perizinan/rejected/{id}', 'getRejected')->name('perizinan.getRejected')->middleware(['permission:LEMBAGA']);
            Route::get('/perizinan/alasan/{id}', 'getAlasan')->name('perizinan.getAlasan')->middleware(['permission:LEMBAGA']);
            Route::post('/perizinan', 'store')->name('perizinan.store')->middleware(['permission:LEMBAGA']);
            Route::post('/perizinan/{id}', 'update')->name('perizinan.update')->middleware(['permission:LEMBAGA']);
            Route::delete('/perizinan/{id}/destroy', 'destroy')->name('perizinan.destroy')->middleware(['permission:LEMBAGA']);
        });

        Route::controller(AbsensiController::class)->group(function () {
            Route::prefix('laporan/absensi')->group(function () {
                Route::get('/', 'absensi')->name('laporan.absensi')->middleware(['permission:LEMBAGA']);
                Route::get('/peringkat', 'peringkat')->name('laporan.peringkat')->middleware(['permission:LEMBAGA']);
                    Route::prefix('cetak')->group(function () {
                        Route::get('/pertanggal', 'pertanggal')->name('cetak.pertanggal')->middleware(['permission:LEMBAGA']);
                        Route::get('/persiswa', 'persiswa')->name('cetak.persiswa')->middleware(['permission:LEMBAGA']);
                        Route::get('/perhari', 'perhari')->name('cetak.perhari')->middleware(['permission:LEMBAGA']);
                    });
            });
        });

        Route::prefix('settings')->controller(CodeQRController::class)->group(function () {
            Route::controller(ProfilController::class)->group(function () {
                Route::get('/profil', 'index')->name('settings.admin.getProfil')->middleware(['permission:MASTER']);
                Route::post('/profil/update', 'update')->name('settings.admin.postProfil')->middleware(['permission:MASTER']);
            });
            Route::controller(CodeQRController::class)->group(function () {
                Route::get('/password_qr', 'index')->name('settings.admin.getQr')->middleware(['permission:LEMBAGA']);
                Route::post('/password_qr/update', 'update')->name('settings.admin.postQr')->middleware(['permission:LEMBAGA']);
            });
            Route::controller(MesinController::class)->group(function () {
                Route::get('/password_mesin', 'index')->name('settings.admin.getMesin')->middleware(['permission:LEMBAGA']);
                Route::post('/password_mesin/update', 'update')->name('settings.admin.postMesin')->middleware(['permission:LEMBAGA']);
            });
        });
    });
});
