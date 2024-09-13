<?php

use App\Http\Controllers\PersonasController;
use App\Models\Persona;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonasController::class, 'index']);

Route::get('/crear', [PersonasController::class, 'crear']);

Route::post('/crear', [PersonasController::class, 'guardar']);

Route::get("/modificar/{id}", [PersonasController::class, 'modificar'])->name('modificar');

Route::put("/modificar/{id}", [PersonasController::class, 'guardarModificacion']);

Route::delete("/eliminar/{id}", [PersonasController::class, 'eliminar'])->name('eliminar');