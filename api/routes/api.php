<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;

// Ruta de ejemplo para probar si funciona
Route::get('/ejercicios', [ExerciseController::class, 'index']);

Route::get('/test', function () {
    return response()->json(['mensaje' => 'Funciona la API 🚀']);
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);