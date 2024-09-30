<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ProfesorController;
use App\Models\Persona;
use App\Models\Profesor;
use Illuminate\Support\Facades\Route;

Route::get('/Personas', [PersonasController::class, 'index']);

Route::get('/Personas/crear', [PersonasController::class, 'crear']);

Route::post('/Personas/crear', [PersonasController::class, 'guardar']);

Route::get("/Personas/modificar/{id}", [PersonasController::class, 'modificar'])->name('modificar');

Route::put("/Personas/modificar/{id}", [PersonasController::class, 'guardarModificacion']);

Route::delete("/Personas/eliminar/{id}", [PersonasController::class, 'eliminar'])->name('eliminar');

Route::get('/Estudiantes', [EstudianteController::class, 'index']);

Route::get('/Estudiantes/Crear', [EstudianteController::class, 'crear']);

Route::post('/Estudiantes/Crear', [EstudianteController::class, 'guardar']);

Route::get('/Estudiantes/Modificar/{cedula}', [EstudianteController::class, 'modificar']);

Route::put('/Estudiantes/Modificar/{cedula}', [EstudianteController::class, 'guardarModificacion']);

Route::delete('/Estudiantes/Eliminar/{cedula}', [EstudianteController::class, 'eliminar']);

Route::get('/Profesores', [ProfesorController::class, 'index']);

Route::get('/Profesores/Crear', [ProfesorController::class, 'crear']);

Route::post('/Profesores/Crear', [ProfesorController::class, 'guardar']);

Route::get('/Profesores/Modificar/{cedula}', [ProfesorController::class, 'modificar']);

Route::put('/Profesores/Modificar/{cedula}', [ProfesorController::class, 'guardarModificacion']);

Route::delete('/Profesores/Eliminar/{cedula}', [ProfesorController::class, 'eliminar']);