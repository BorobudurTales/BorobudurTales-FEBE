<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccesRegistrasiController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('users.home', [
        'title' => 'Home'
    ]);
})->name('home');

// Halaman awal untuk memilih metode upload


Route::get('/verify-success', function () {
    return view('auth.verify-success');
})->middleware(['auth', 'verified'])->name('verifyS');

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin')->middleware(RoleMiddleware::class . ':admin');

    Route::get('/user', [UserController::class, 'index'])->name('user.admin')->middleware(RoleMiddleware::class . ':admin');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.admin.create')->middleware(RoleMiddleware::class . ':admin');
    Route::post('/user', [UserController::class, 'store'])->name('user.admin.store')->middleware(RoleMiddleware::class . ':admin');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.admin.detail')->middleware(RoleMiddleware::class . ':admin');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.admin.update')->middleware(RoleMiddleware::class . ':admin');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.admin.destroy')->middleware(RoleMiddleware::class . ':admin');

    Route::get('/data', [DataController::class, 'index'])->name('data.admin')->middleware(RoleMiddleware::class . ':admin');
    Route::get('/data/{id}', [DataController::class, 'show'])->name('data.admin.detail')->middleware(RoleMiddleware::class . ':admin');
    Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.admin.destroy')->middleware(RoleMiddleware::class . ':admin');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.admin')->middleware(RoleMiddleware::class . ':admin');
    Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.admin.destroy')->middleware(RoleMiddleware::class . ':admin');

    Route::get('/profile-admin', [AdminProfileController::class, 'index'])->name('profile.admin')->middleware(RoleMiddleware::class . ':admin|user');
    Route::put('/profile-admin', [AdminProfileController::class, 'update'])->name('profile.admin.update')->middleware(RoleMiddleware::class . ':admin|user');



    // User
    Route::get('/explore', function () {
        return view('users.explore', [
            'title' => 'Explore'
        ]);
    })->name('explore')->middleware(RoleMiddleware::class . ':admin|user');
    Route::get('/library', [LibraryController::class, 'index'])->name('library')->middleware(RoleMiddleware::class . ':admin|user');
    Route::get('/library/{id}', [LibraryController::class, 'show'])->name('library.detail')->middleware(RoleMiddleware::class . ':admin|user');

    Route::get('/upload', [UploadImageController::class, 'index'])->name('upload')->middleware(RoleMiddleware::class . ':admin|user');
    Route::get('/upload/image', [UploadImageController::class, 'uploadImage'])->name('upload.image')->middleware(RoleMiddleware::class . ':admin|user');
    Route::post('/upload/image', [UploadImageController::class, 'analyze'])->name('upload.image.analyze')->middleware(RoleMiddleware::class . ':admin|user');
    Route::get('/upload/camera', [UploadImageController::class, 'takeImage'])->name('upload.camera')->middleware(RoleMiddleware::class . ':admin|user');
    Route::get('/result', [UploadImageController::class, 'showResult'])->name('result')->middleware(RoleMiddleware::class . ':admin|user');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(RoleMiddleware::class . ':admin|user');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware(RoleMiddleware::class . ':admin|user');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware(RoleMiddleware::class . ':admin|user');
});

// Route::middleware(['auth', RoleMiddleware::class . ':admin', 'verified'])->prefix('admin')->group(function () {});

require __DIR__ . '/auth.php';
