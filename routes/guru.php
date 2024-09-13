<?php

use App\Http\Controllers\Guru\GuruController;
use App\Http\Middleware\isGuru;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| guru Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([isGuru::class])->group(function () {
    Route::prefix('guru')
        ->controller(GuruController::class)
        ->group(function () {
            Route::get('/', 'beranda')->name('guru.beranda');
            
            Route::get('/absen/manual', 'getAbsenManual')->name('guru.getAbsenManual');
            Route::post('/absen/manual', 'postAbsenManual')->name('guru.postAbsenManual');

            Route::get('/absen/detail', 'showAbsen')->name('guru.showAbsen');
            Route::post('/absen', 'storeAbsen')->name('guru.storeAbsen');

            Route::get('/auth/code_qr', 'codeqrIndex')->name('guru.codeqrIndex');
            Route::post('/auth/code_qr', 'codeqrPost')->name('guru.codeqrPost');
            Route::get('/code_qr', 'code_qr')->name('guru.code_qr');
            Route::post('/post_code_qr', 'postQrResponse')->name('guru.postQrResponse');

            Route::get('/auth/mesin', 'codeMesinIndex')->name('guru.codeMesinIndex');
            Route::post('/auth/mesin', 'codeMesinPost')->name('guru.codeMesinPost');
            Route::get('/mesin', 'mesin')->name('guru.mesin');
        });
});
