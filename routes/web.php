<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.user.login');
});
Route::get('/privacy_location', function () {
    return view('privacy_location');
});

// component
Route::get('/template', function () {
    $pages = 'template';
    return view('components.template', compact('pages'));
});

// laravolt
Route::controller(LaravoltController::class)->group(function () {
    Route::get('/provinsi', 'provinsi')->name('provinsi');
    Route::get('/kabupaten', 'kabupaten')->name('kabupaten');
    Route::get('/kecamatan', 'kecamatan')->name('kecamatan');
    Route::get('/kelurahan', 'kelurahan')->name('kelurahan');
});

// pages absensi
Route::controller(PagesController::class)->group(function () {
    Route::get('/code_qr', 'code_qr')->name('pages.code_qr');
    Route::post('/post_code_qr', 'postQrResponse')->name('pages.postQrResponse');
    
    Route::get('/auth/code_qr', 'codeqrIndex')->name('pages.codeqrIndex');
    Route::post('/auth/code_qr', 'codeqrPost')->name('pages.codeqrPost');


    Route::get('/auth/mesin', 'codeMesinIndex')->name('pages.codeMesinIndex');
    Route::post('/auth/mesin', 'codeMesinPost')->name('pages.codeMesinPost');

    Route::get('/mesin', 'mesin')->name('pages.mesin');
    Route::post('/mesin/absen', 'storeAbsen')->name('pages.storeAbsenMesin');

    Route::get('/kehadiran', 'kehadiran')->name('pages.kehadiran');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/guru.php';
require __DIR__ . '/siswa.php';
require __DIR__ . '/auth.php';
