<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/ejercicios', [ExerciseController::class, 'index']);

// Ruta de prueba pública
Route::get('/test', function () {
    return response()->json(['mensaje' => 'Funciona la API 🚀']);
});

// Rutas protegidas por Sanctum → requieren token Bearer
Route::middleware('auth:sanctum')->group(function () {

    // Usuarios logueados (con cualquier rol)
    Route::get('/entrenamiento/{meta}', [ExerciseController::class, 'generarEntrenamiento']);

    // Solo admin (Spatie middleware)
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::post('/admin/exercises', [ExerciseController::class, 'store']);
    });

    // Ruta para que el frontend pueda traer datos del usuario autenticado
    Route::get('/me', function (Request $request) {
        return response()->json($request->user());
    });
});
