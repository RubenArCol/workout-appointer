<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/test', function () {
    return response()->json(['mensaje' => 'Funciona la API desde web.php 🚀']);
});

Route::get('/api/ejercicios', [ExerciseController::class, 'index']);
