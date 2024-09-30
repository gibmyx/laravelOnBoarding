<?php

namespace App\Repository\PeopleRepository;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PeopleRepository{

    public function Listar():Collection{
        $persona = Persona::all();
        return $persona;
    }

    public function CrearPersona(Persona $persona):void{
        $persona->save();
    }

    public function BuscarPersona(int $id):Persona /*Retorna objeto */ {
        $persona = Persona::find($id);
        return $persona;
    }

    public function ModificarPersona(Request $request, int $id): void{
        $personaActual = Persona::find($id);
        $personaActual->nombre = $request->nombre;
        $personaActual->apellido = $request->apellido;
        $personaActual->email = $request->email;
        $personaActual->descripcion = $request->descripcion;
        $personaActual->save();
    }

    public function EliminarPersona(int $id): void{
        $persona = Persona::find($id);
        $persona->delete();
    }
}
?>