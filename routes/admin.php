<?php

use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Middleware\isAdmin;
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

Route::middleware(isAdmin::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/beranda', function () {
            return view('admin.beranda');
        });
        Route::controller(TahunAjaranController::class)->group(function () {
            Route::get('/tahun_ajaran', 'index')->name('tahun_ajaran.index');
            Route::post('/tahun_ajaran', 'store')->name('tahun_ajaran.store');
            Route::get('/tahun_ajaran/{id}', 'edit')->name('tahun_ajaran.edit');
            Route::post('/tahun_ajaran/{id}', 'update')->name('tahun_ajaran.update');
            Route::delete('/tahun_ajaran/{id}/destroy', 'destroy')->name('tahun_ajaran.destroy');
        });
        Route::controller(SemesterController::class)->group(function () {
            Route::get('/semester', 'index')->name('semester.index');
            Route::post('/semester', 'store')->name('semester.store');
            Route::get('/semester/{id}', 'edit')->name('semester.edit');
            Route::post('/semester/{id}', 'update')->name('semester.update');
            Route::delete('/semester/{id}/destroy', 'destroy')->name('semester.destroy');
        });
    });
});
