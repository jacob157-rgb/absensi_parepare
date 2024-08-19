<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin

Route::controller(AuthenticationController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'getAdmin');
        Route::post('/post', 'postAdmin')->name('admin.post');
        Route::post('/logout', 'logoutAdmin')->name('admin.logout');
    });

    Route::post('/siswa', 'postSiswa')->name('siswa.post');
    Route::post('/wali', 'postWali')->name('wali.post');
    Route::post('/guru', 'postGuru')->name('guru.post');
});
