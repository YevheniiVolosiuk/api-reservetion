<?php

use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\V1\Owner\PropertyController;
use App\Http\Controllers\API\V1\User\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', RegisterController::class);

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('owner/properties', [PropertyController::class, 'index']);
    Route::get('user/bookings', [BookingController::class, 'index']);
});

