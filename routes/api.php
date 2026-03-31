<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainController;
use Illuminate\Support\Facades\Route;

// ── Auth Routes ───────────────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth.jwt');

// ── Train Routes ──────────────────────────────────────────────────
Route::middleware('auth.jwt')->group(function () {
    Route::get('/trains',         [TrainController::class, 'index']);
    Route::get('/trains/{id}',    [TrainController::class, 'show']);
    Route::post('/trains',        [TrainController::class, 'store']);
    Route::put('/trains/{id}',    [TrainController::class, 'update']);
    Route::delete('/trains/{id}', [TrainController::class, 'destroy']);
});

// ── 404 fallback ──────────────────────────────────────────────────
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Route not found',
    ], 404);
});
