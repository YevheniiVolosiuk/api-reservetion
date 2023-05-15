<?php

use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\V1\Owner\PropertyController;
use App\Http\Controllers\API\V1\Public\PropertySearchController;
use App\Http\Controllers\API\V1\User\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', RegisterController::class);

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::prefix('owner')->group(function () {
        Route::get('/properties', [PropertyController::class, 'index']);
        Route::post('/properties', [PropertyController::class, 'store']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/bookings', [BookingController::class, 'index']);
    });
});


Route::prefix('v1')->group(function () {
    Route::get('/search', PropertySearchController::class);
});

