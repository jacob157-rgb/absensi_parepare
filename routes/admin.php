<?php

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
    });
});
