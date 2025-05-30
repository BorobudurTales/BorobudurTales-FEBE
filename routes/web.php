<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccesRegistrasiController;
use App\Http\Controllers\UploadController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
})->name('home');

Route::get('/upload', function () {
    return view('users.upload');
})->name('upload');

Route::get('/verify-success', function () {
    return view('auth.verify-success');
})->middleware(['auth', 'verified'])->name('verifyS');


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
});
// Route::get('verify-email', EmailVerificationPromptController::class)
//     ->name('verification.notice');


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

Route::get('/upload-gambar', [UploadController::class, 'index'])->name('upload.gambar');

require __DIR__ . '/auth.php';
