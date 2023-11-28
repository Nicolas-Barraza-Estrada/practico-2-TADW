<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Listar todos los perros
Route::get('todosLosPerros', [PerroController::class, 'index']);

// Registrar un nuevo perro
Route::post('registrarPerro', [PerroController::class, 'store']);

// Ver un perro específico
Route::get('verPerro/{perro}', [PerroController::class, 'show']);

// Actualizar un perro
Route::post('actualizarPerro/{perro}', [PerroController::class, 'update']);

// Eliminar un perro (soft delete)
Route::get('eliminarPerro/{perro}', [PerroController::class, 'destroy']);
