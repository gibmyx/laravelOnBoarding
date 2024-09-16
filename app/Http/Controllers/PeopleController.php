<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\UseCase\CrearPeople;
use App\UseCase\BuscarPeople;
use App\UseCase\MostrarPeople;
use App\UseCase\EditarPeople;
use App\UseCase\EliminarPeople;

class PeopleController extends Controller
{

    public function crear()
    {
        return view('crear');
    }

    public function success()
    {
        $useCase = new CrearPeople();
        $data = request()->all();
        $person = $useCase->execute($data);

        return view('success', compact('person'));
    }

    public function listar()
    {

        $useCase = new MostrarPeople();
        $peoples = $useCase->execute();
        dd($peoples, get_class($peoples));
        
        return view('listar', compact('peoples'));
    }

    public function editar($people)
    {
        $useCase = new MostrarPeople();
        $people = $useCase->execute()->find($people);
        return view('editar', compact('people'));
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
