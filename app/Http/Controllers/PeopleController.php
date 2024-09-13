<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{

    public function crear(){
        return view('crear');
    }

    public function success(){

        $item = request()->all();

        $person = People::create($item);

        return view('success', compact('person'));

    }

    public function listar(){

        $peoples = People::all();

        return view('listar', compact('peoples'));
    }

    public function editar($people){

        $people = People::find($people);

        return view('editar', compact('people'));
    }

    public function update($people){

        $item= request()->all();
        $people = People::find($people);

        $people->update($item);

        return redirect('/people/listar');
    }

    public function eliminar($people){

        $item = People::find($people);

        $item->delete();

        return redirect('/people/listar');

    }

}
