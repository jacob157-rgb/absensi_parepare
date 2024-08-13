<?php

use App\Http\Controllers\Admin\LembagaController;
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
            $pages = 'Beranda';
            return view('admin.beranda', compact('pages'));
        })->name('beranda');
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
        Route::controller(LembagaController::class)->group(function () {
            Route::get('/lembaga', 'index')->name('lembaga.index');
            Route::get('/lembaga/create', 'create')->name('lembaga.create');
            Route::post('/lembaga', 'store')->name('lembaga.store');
            Route::get('/lembaga/{id}', 'edit')->name('lembaga.edit');
            Route::post('/lembaga/{id}', 'update')->name('lembaga.update');
            Route::delete('/lembaga/{id}/destroy', 'destroy')->name('lembaga.destroy');
        });
    });
});
