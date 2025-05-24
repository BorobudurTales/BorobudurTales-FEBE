<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ROUTE PUBLIC (Home)
Route::get('/', function () {
    return view('home');
})->name('home');

// ROUTE YANG BUTUH LOGIN
Route::middleware('auth')->group(function () {

    // Halaman biasa
    Route::get('/explore', function () {
        return view('explore');
    })->name('explore');

    Route::get('/library', function () {
        return view('library');
    })->name('library');

    Route::get('/library-a', function () {
        return view('library-a');
    })->name('library-a');

    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');

    // Dashboard & Profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE AUTH (dari Breeze)
require __DIR__.'/auth.php';
