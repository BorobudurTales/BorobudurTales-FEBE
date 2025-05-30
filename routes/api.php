<?php

use App\Http\Controllers\Api\CeritaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ceritas', [CeritaApiController::class, 'index']);
    Route::get('/ceritas{id}', [CeritaApiController::class, 'show']);
});
