<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\PeopleCase\PeopleCase;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index(){
        $personas = PeopleCase::ListarPeople();
        return view('ListaPersonas', ['persona' => $personas]);
    }

    public function crear(){
        return view('CrearPersona');
    }

    public function guardar(Request $request){
        PeopleCase::CrearPeople($request);
        return redirect('/');
    }

    public function modificar($id){
        
        $persona = PeopleCase::BuscarPersona($id);

        return view('ModificarPersona', compact('persona'));
    }

    public function guardarModificacion(Request $request, $id){
        PeopleCase::ModificarPersona($request, $id);

        return redirect('/');
    }
    
    public function eliminar($id){
        PeopleCase::EliminarPersona($id);
        return redirect("/");
    }
}
