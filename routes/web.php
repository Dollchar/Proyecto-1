<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\PageController;
 
/*
|--------------------------------------------------------------------------
| Web Routes — KUKE's Sneaker Store
|--------------------------------------------------------------------------
*/
 
// Página principal → catálogo hombre
Route::get('/', [SneakerController::class, 'index'])->name('sneakers.index');
Route::get('/tenis', [SneakerController::class, 'index'])->name('sneakers.catalog');

// Categorías
Route::get('/categoria/{slug}', [SneakerController::class, 'category'])->name('sneakers.category');

// Detalle de un tenis
Route::get('/tenis/{id}', [SneakerController::class, 'show'])->name('sneakers.show');

// Búsqueda
Route::get('/buscar', [SneakerController::class, 'search'])->name('sneakers.search');

// API JSON para JS
Route::get('/api/productos', [SneakerController::class, 'apiProducts'])->name('api.products');

// Páginas estáticas
Route::get('/devoluciones', [PageController::class, 'devoluciones'])->name('pages.devoluciones');
Route::get('/envios', [PageController::class, 'envios'])->name('pages.envios');
Route::get('/guia-de-tallas', [PageController::class, 'tallas'])->name('pages.tallas');
Route::get('/contacto', [PageController::class, 'contacto'])->name('pages.contacto');
Route::get('/sobre-nosotros', [PageController::class, 'nosotros'])->name('pages.nosotros');
Route::get('/editorial', [PageController::class, 'editorial'])->name('pages.editorial');
Route::get('/favoritos', [PageController::class, 'favoritos'])->name('pages.favoritos');

// ── AUTH ROUTES ──────────────────────────────────
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;

Route::middleware('guest')->group(function () {
    Route::get('/login',      [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',     [AuthController::class, 'login']);
    Route::get('/register',   [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',  [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Google OAuth
Route::get('/auth/google',          [GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

// Mi cuenta (protected)
Route::middleware('auth')->group(function () {
    Route::get('/mi-cuenta', function () {
        return view('auth.account');
    })->name('account');
});

