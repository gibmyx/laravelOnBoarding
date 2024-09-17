<?php

namespace App\PeopleCase;

use App\Models\Persona;
use App\Repository\PeopleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PeopleCase{
    private $repository;

    public function __construct()
    {
        $this->repository = (new PeopleRepository());
    }

    public function ListarPeople():Collection{
        $personas = $this->repository->Listar();
        return $personas; 
    }

    public function CrearPeople(Request $request):void{
        $persona = new Persona;

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->descripcion = $request->descripcion;
        
        $this->repository->CrearPersona($persona);
    }

    public function BuscarPersona(int $id):Persona{
        $persona = $this->repository->BuscarPersona($id);
        return $persona;
    }

    public function ModificarPersona(Request $request, int $id):void{
        $this->repository->ModificarPersona($request, $id);
    }

    public function EliminarPersona(int $id):void{
        $this->repository->EliminarPersona($id);
    }
}

?>