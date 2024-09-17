<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\PeopleCase\PeopleCase;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    private $people;
    public function __construct()
    {
        $this->people = (new PeopleCase());
    }

    public function index(){
        $personas = $this->people->ListarPeople();
        return view('ListaPersonas', ['persona' => $personas]);
    }

    public function crear(){
        return view('CrearPersona');
    }

    public function guardar(Request $request){
        $this->people->CrearPeople($request);
        return redirect('/');
    }

    public function modificar(int $id){
        
        $persona = $this->people->BuscarPersona($id);

        return view('ModificarPersona', compact('persona'));
    }

    public function guardarModificacion(Request $request, int $id){
        $this->people->ModificarPersona($request, $id);

        return redirect('/');
    }
    
    public function eliminar(int $id){
        $this->people->EliminarPersona($id);
        return redirect("/");
    }
}
