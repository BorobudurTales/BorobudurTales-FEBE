<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccesRegistrasiController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
})->name('home');

// Halaman awal untuk memilih metode upload
Route::get('/upload', [UploadImageController::class, 'index'])->name('upload');
Route::get('/upload/image', [UploadImageController::class, 'uploadImage'])->name('upload.image');
Route::get('/upload/camera', [UploadImageController::class, 'takeImage'])->name('upload.camera');
Route::post('/upload/image', [UploadImageController::class, 'storeImage'])->name('upload.image.store');

// Hapus ResultController dan ganti dengan route ini
Route::get('/upload/result', [UploadImageController::class, 'showResult'])->name('upload.result');

Route::get('/result', [UploadImageController::class, 'showResult'])->name('result');

Route::get('/verify-success', function () {
    return view('auth.verify-success');
})->middleware(['auth', 'verified'])->name('verifyS');

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/explore', function () {
        return view('users.explore');
    })->name('explore');

    Route::get('/library', [LibraryController::class, 'index'])->name('library');
    Route::get('/library/{id}', [LibraryController::class, 'show'])->name('library.detail');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
