<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiImageController;
use App\Http\Controllers\Api\CeritaApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return response()->json(['message' => 'Email verified']);
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/resend', function (Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified']);
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent']);
    });


    Route::get('/ceritas', [CeritaApiController::class, 'index']);
    Route::get('/ceritas/{id}', [CeritaApiController::class, 'show']);

    Route::post('/analyze-image', [ApiImageController::class, 'analyzeImage']);
});
