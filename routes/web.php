<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;

//Rutas para la entidad People
Route::get('/people', PeopleController::class);

Route::get('/people/crear', [PeopleController::class, 'crear']);

Route::get('/people/listar', [PeopleController::class, 'listar']);

Route::get('/people/{people}/eliminar', [PeopleController::class, 'eliminar']);

Route::post('/people/success', [peopleController::class, 'success']);

Route::get('/people/{people}/editar', [PeopleController::class, 'editar']);

Route::put('/people/{people}', [PeopleController::class, 'update']);

//Rutas para la entidad Home
Route::get('/', HomeController::class);

//Rutas para la entidad Student
Route::get('/student/crear', [StudentController::class, 'create']);

Route::post('/student/success', [StudentController::class, 'success']);

Route::get('/student/listar', [StudentController::class, 'listar']);

Route::get('/student/{student}/eliminar', [StudentController::class, 'eliminar']);

Route::get('/student/{student}/editar', [StudentController::class, 'editar']);

Route::put('/student/{student}', [StudentController::class, 'update']);

//Rutas para la entidad Professor
Route::get('/professor/crear', [ProfessorController::class, 'create']); 

Route::post('/professor/success', [ProfessorController::class, 'success']);

Route::get('/professor/listar', [ProfessorController::class, 'listar']);

Route::get('/professor/{professor}/eliminar', [ProfessorController::class, 'eliminar']);

Route::get('/professor/{professor}/editar', [ProfessorController::class, 'editar']);

Route::put('/professor/{professor}', [ProfessorController::class, 'update']);

// VUE
Route::get('/vue', function(){
    return view('home');
});