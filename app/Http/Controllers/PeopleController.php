<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\UseCase\People\CrearPeople;
use App\UseCase\People\BuscarPeople;
use App\UseCase\People\MostrarPeople;
use App\UseCase\People\EditarPeople;
use App\UseCase\People\EliminarPeople;

class PeopleController extends Controller
{
    public function __invoke(){
        return view('people.homepeople');
    }

    public function crear()
    {
        return view('people.crear');
    }

    public function success()
    {
        $useCase = new CrearPeople();
        $data = request()->all();
        $person = $useCase->execute($data);
        return view('people.success', compact('person'));
    }

    public function listar()
    {
        $useCase = new MostrarPeople();
        $peoples = $useCase->execute();
        return view('people.listar', compact('peoples'));
    }

    public function editar($people)
    {
        $useCase = new MostrarPeople();
        $people = $useCase->execute()->find($people);
        return view('people.editar', compact('people'));
    }

    public function update($people)
    {
        $useCase = new EditarPeople();
        $useCase->execute($people);
        return redirect('/people/listar');
    }

    public function eliminar($people)
    {
        $useCase = new EliminarPeople();
        $useCase->execute($people);
        return redirect('/people/listar');
    }
}
