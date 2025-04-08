<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

// Ruta de ejemplo para probar si funciona
Route::get('/ejercicios', [ExerciseController::class, 'index']);

Route::get('/test', function () {
    return response()->json(['mensaje' => 'Funciona la API 🚀']);
});