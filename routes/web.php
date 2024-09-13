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



/*
Route::get('people', function (){

        $people = new People;

        $people -> name = 'Victor';
        $people -> surname = 'Marcella';
        $people -> email = 'victor@example.com';
        $people -> description = 'Alto';
        $people -> save();

    return $people;
});
*/

/*Route::get('/post', [PostController::class, 'index']);

Route::get('/post/create', [PostController::class, 'create']);

Route::get('/post/{post}', [PostController::class, 'show']);*/
