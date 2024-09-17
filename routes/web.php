<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeopleController;

Route::get('/', HomeController::class);

Route::get('/people/crear', [PeopleController::class, 'crear']);

Route::get('/people/listar', [PeopleController::class, 'listar']);

Route::get('/people/{people}/eliminar', [PeopleController::class, 'eliminar']);

Route::post('/people/success', [peopleController::class, 'success']);

Route::get('/people/{people}/editar', [PeopleController::class, 'editar']);

Route::put('/people/{people}', [PeopleController::class, 'update']);