<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\MapSectionController;
use App\Http\Controllers\PaketBiasaController;
use App\Http\Controllers\PaketSpesialController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::put('/pembayaran/{id}/status', [DashboardController::class, 'updateStatus'])->name('pembayaran.updateStatus');
    // });
    Route::prefix('content')->name('content.')->group(function () {
        Route::get('/hero-section/check', [HeroSectionController::class, 'checkAndRedirect'])->name('hero-section.check');
        Route::resource('hero-section', HeroSectionController::class)->except(['index']);

        Route::get('/map-section/check', [MapSectionController::class, 'checkAndRedirect'])->name('map-section.check');
        Route::resource('map-section', MapSectionController::class)->except('index');

        Route::resource('paket-biasa', PaketBiasaController::class);

        Route::resource('paket-spesial', PaketSpesialController::class);
    });
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/users', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::put('/{id}/role', [UserController::class, 'updateRole'])->name('updateRole');
    });
});
