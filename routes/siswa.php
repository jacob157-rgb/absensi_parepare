<?php

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
    Route::prefix('siswa')->group(function () {
        Route::get('/', function () {
            $pages = 'Beranda';
            return view('siswa.beranda', compact('pages'));
        })->name('siswa.beranda');

    });
});
