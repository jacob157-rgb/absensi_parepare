<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;

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

require __DIR__ . '/admin.php';
require __DIR__ . '/guru.php';
require __DIR__ . '/siswa.php';
require __DIR__ . '/auth.php';
