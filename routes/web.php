<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

/* Route::get('/', function () {
    return view('inicio');
});
 */

Route::get('/', [FrontController::class, 'index']) -> name('home');