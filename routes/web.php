<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;

// ✅ Home bisa diakses semua orang
Route::get('/', function () {
    return view('home');
})->name('home');

// ✅ Dashboard hanya bisa diakses setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ✅ Halaman lain (setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/library', [LibraryController::class, 'index'])->name('library');

    // Tambahan untuk Explore dan Upload biar navbar kamu gak broken
    Route::get('/explore', function () {
        return view('explore');
    })->name('explore');

    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Route Auth (login, register, dll)
require __DIR__.'/auth.php';
