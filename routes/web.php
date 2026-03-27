<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;
 
/*
|--------------------------------------------------------------------------
| Web Routes — STEPUP Sneaker Store
|--------------------------------------------------------------------------
*/
 
// Página principal → catálogo de tenis
Route::get('/', [SneakerController::class, 'index'])->name('sneakers.index');
 
// También accesible desde /tenis
Route::get('/tenis', [SneakerController::class, 'index'])->name('sneakers.catalog');
 
