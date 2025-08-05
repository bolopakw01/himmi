<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================================================================
// Rute untuk Halaman Publik (Frontend)
// =====================================================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/program', [PageController::class, 'program'])->name('program');
Route::get('/struktur', [PageController::class, 'struktur'])->name('struktur');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/klien', [ClientController::class, 'index'])->name('klien.index');


// =====================================================================
// Rute untuk Dasbor dan Area Admin (Backend)
// =====================================================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::resource('clients', ClientController::class);
    Route::patch('/media/{medium}/toggle', [MediaController::class, 'toggleStatus'])->name('media.toggleStatus');
    Route::resource('media', MediaController::class);

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