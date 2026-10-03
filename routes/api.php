<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::get('/incidentes/home-search', [HomeController::class, 'index']);
Route::get('/incidentes/search', [HomeController::class, 'search']);
Route::get('/incidentes/user/{userId}', [IncidenteController::class, 'fetchByUser']);

Route::apiResource('incidentes', IncidenteController::class)->middleware('auth:sanctum'); 

Route::middleware(['auth:sanctum',
'abilities:users:read'])->group(function () {
    Route::get('/users/search', [\App\Http\Controllers\AdminUserController::class, 'search']);
    Route::get('/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'fetchById']);
    
});

Route::middleware(['auth:sanctum','abilities:users:update'])->group(function () {
    Route::put('/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'update']);
});

Route::middleware(['auth:sanctum','abilities:users:delete'])->group(function () {
    Route::delete('/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'destroy']);
});
