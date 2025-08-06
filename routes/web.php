<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan ditetapkan ke
| grup middleware "web".
|
*/

// =====================================================================
// Rute untuk Halaman Publik (Frontend)
// =====================================================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/struktur', [PageController::class, 'struktur'])->name('struktur');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{article:slug}', [PageController::class, 'showArticle'])->name('artikel.show');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/klien', [ClientController::class, 'index'])->name('klien.index');

// =====================================================================
// Rute untuk Dasbor dan Area Admin (Backend)
// =====================================================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute untuk semua manajemen admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk Klien
    Route::resource('clients', ClientController::class);

    // Rute untuk Struktur
    Route::resource('structures', StructureController::class);
    Route::patch('/structures/{medium}/toggle', [StructureController::class, 'toggleStatus'])->name('structures.toggleStatus');

    // Rute untuk Galeri
    Route::resource('galleries', GalleryController::class);
    Route::delete('/gallery-photos/{photo}', [GalleryController::class, 'destroyPhoto'])->name('gallery-photos.destroy');

    // Rute untuk Artikel
    Route::resource('articles', ArticleController::class);

});

// =====================================================================
// Rute Profil Pengguna (Bawaan Breeze)
// =====================================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================================================================
// Rute Autentikasi (Bawaan Breeze)
// =====================================================================
require __DIR__.'/auth.php';