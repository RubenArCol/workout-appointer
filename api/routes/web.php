<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/panel', function () {
        return view('home.index');
    })->name('home.index');

    // creación
    Route::view('/admin/users', 'users.index')->name('admin.users.index');
    Route::post('/admin/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');

    Route::view('/admin/exercises', 'exercises.index')->name('admin.exercises.index');
    Route::post('/admin/exercises/store', [ExerciseController::class, 'store'])->name('exercises.store');

    // listado
    Route::get('/admin/users/list', [AdminUserController::class, 'index'])->name('usuarios.list');
    Route::post('/admin/users/{user}/update-permissions', [AdminUserController::class, 'updatePermissions'])->name('usuarios.update.permissions');
    Route::get('/admin/exercises/list', [ExerciseController::class, 'listView'])->name('exercises.list');
});

require __DIR__.'/auth.php';
