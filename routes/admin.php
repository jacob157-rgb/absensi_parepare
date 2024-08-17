<?php

use App\Http\Controllers\Admin\JamKerjaController;
use App\Http\Controllers\Admin\KalenderAkademikConttroller;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\LembagaController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\Permission;
use Illuminate\Support\Facades\Route;

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
            $pages = 'Beranda';
            return view('admin.beranda', compact('pages'));
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
    });
});
