<?php

use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('auth/register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function (){

});

