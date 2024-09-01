<?php

use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Middleware\isSiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Siswa Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([isSiswa::class])->group(function () {
    Route::prefix('siswa')->controller(SiswaController::class)->group(function () {
        Route::get('/',  'beranda')->name('siswa.beranda');
        Route::get('/absen',  'absen')->name('siswa.absen');

        Route::get('/perizinan',  'perizinan')->name('siswa.perizinan');
        Route::get('/perizinan/create',  'perizinanCreate')->name('siswa.perizinan.create');
        Route::post('/perizinan/store',  'perizinanStore')->name('siswa.perizinan.store');
        Route::get('/perizinan/edit/{id}',  'perizinanEdit')->name('siswa.perizinan.edit');
        Route::post('/perizinan/update/{id}',  'perizinanUpdate')->name('siswa.perizinan.update');
        Route::get('/perizinan/alasan/{id}',  'perizinanAlasan')->name('siswa.perizinan.alasan');
        Route::delete('/perizinan/destroy/{id}',  'perizinanDestroy')->name('siswa.perizinan.destroy');

        Route::get('/detail_absensi',  'detail_absensi')->name('siswa.detail_absensi');
        Route::get('/live',  'live')->name('siswa.live');

    });
});
