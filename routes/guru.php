<?php

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

Route::get('/guru', function () {
    return 'route guru';
});
