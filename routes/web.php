<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Halaman Publik ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/struktur', [PageController::class, 'struktur'])->name('struktur');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/klien', [ClientController::class, 'index'])->name('klien.index');

// --- Rute Dasbor & Area Admin (Perlu Login) ---
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // CRUD Klien
    Route::resource('clients', ClientController::class);

    // Toggle Status Struktur
    Route::patch('/structures/{medium}/toggle', [StructureController::class, 'toggleStatus'])->name('structures.toggleStatus');
    // CRUD Struktur
    Route::resource('structures', StructureController::class);

    // Hapus Foto Tunggal dari Galeri
    Route::delete('/gallery-photos/{photo}', [GalleryController::class, 'destroyPhoto'])->name('gallery-photos.destroy');
    // CRUD Galeri (Album)
    Route::resource('galleries', GalleryController::class);

    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
});

// --- Rute Profil Pengguna (Bawaan Breeze) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Rute Autentikasi (Bawaan Breeze) ---
require __DIR__ . '/auth.php';
