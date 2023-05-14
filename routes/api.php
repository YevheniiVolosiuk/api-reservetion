<?php

use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function (){
    Route::post('auth/register', RegisterController::class);
});

