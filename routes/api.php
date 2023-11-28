<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

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

// Obtener un perro random
Route::get('perroRandom', [PerroController::class, 'getPerroRandom']);

// Obtener perros candidatos
Route::get('perrosCandidatos/{perroIdInteresado}', [PerroController::class, 'getPerrosCandidatos']);

// Guardar preferencias
Route::post('guardarPreferencias', [InteraccionController::class, 'guardarPreferencias']);

//Ver los aceptados/rechazados de un perro por su id
Route::get('/perrosAceptados/{id}', [PerroController::class, 'getPerrosAceptados']);
Route::get('/perrosrechazados/{id}', [PerroController::class, 'getPerrosRechazados']);
