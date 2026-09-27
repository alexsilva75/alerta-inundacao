<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
Route::get('/', function () {
    //return view('welcome');
    return response()->json(['data' => 'Alerta de Inundações - Sistema de registro de incidentes climáticos'], 200);
})->name('home');
