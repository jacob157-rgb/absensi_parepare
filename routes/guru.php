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
    Route::prefix('guru')->controller(GuruController::class)->group(function () {
        Route::get('/',  'beranda')->name('guru.beranda');
    });
});
