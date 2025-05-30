<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccesRegistrasiController;
use App\Http\Controllers\UploadController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/beranda', function () {
    return view('users/beranda');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman explore
Route::get('/explore', function () {
    return view('pages.explore');
})->name('explore');

// Halaman library
Route::get('/library_detail', function () {
    return view('pages.library_detail');
})->name('library_detail');
Route::patch('/verify-success', [SuccesRegistrasiController::class, 'index'])->name('success.verify');


Route::middleware('auth')->group(function () {
    Route::get('/library', [LibraryController::class, 'index'])->name('library');
    
    Route::get('/explore', function () {
        return view('explore');
    })->name('explore');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/upload-gambar', [UploadController::class, 'index'])->name('upload');

require __DIR__ . '/auth.php';
