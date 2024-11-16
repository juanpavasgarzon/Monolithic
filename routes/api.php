<?php

use App\Core\User\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->controller(UserController::class)->group(function () {
    Route::post("register", 'register');
    Route::post("login", 'login');
    Route::post("logout", 'logout')->middleware("auth:sanctum");
});

