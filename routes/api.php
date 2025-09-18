<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("user", UserController::class);
});
Route::post("login", [AuthController::class, 'login']);
Route::post("register", [AuthController::class, 'register']);
