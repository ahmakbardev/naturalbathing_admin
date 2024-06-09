<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\MapSectionController;
use App\Http\Controllers\PaketBiasaController;
use App\Http\Controllers\PaketSpesialController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
});


Route::middleware('auth:admin')->group(function () {
    // Route::prefix('admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
        return view('index');
    })->name('admin.dashboard');
    // });
    Route::prefix('content')->name('content.')->group(function () {
        Route::get('/hero-section/check', [HeroSectionController::class, 'checkAndRedirect'])->name('hero-section.check');
        Route::resource('hero-section', HeroSectionController::class)->except(['index']);

        Route::get('/map-section/check', [MapSectionController::class, 'checkAndRedirect'])->name('map-section.check');
        Route::resource('map-section', MapSectionController::class)->except('index');

        Route::resource('paket-biasa', PaketBiasaController::class);

        Route::resource('paket-spesial', PaketSpesialController::class);
    });
});
