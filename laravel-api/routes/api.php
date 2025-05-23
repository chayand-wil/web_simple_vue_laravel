<?php


use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::get('/admin-data', function () {
            return response()->json(['data' => 'Solo admin puede ver esto']);
        });
    });

    Route::middleware(RoleMiddleware::class . ':ayudante')->group(function () {
        Route::get('/ayudante-data', function () {
            return response()->json(['data' => 'Solo ayudante puede ver esto']);
        });
    });
});
