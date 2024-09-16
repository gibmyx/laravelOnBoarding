<?php

namespace App\Repository;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Collection;

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

    public function ModificarPersona(Persona $persona, int $id): void{
        $personaActual = Persona::find($id);
        $personaActual->nombre = $persona->nombre;
        $personaActual->apellido = $persona->apellido;
        $personaActual->email = $persona->email;
        $personaActual->descripcion = $persona->descripcion;
        $personaActual->save();
    }

    public function EliminarPersona(int $id): void{
        $persona = Persona::find($id);
        $persona->delete();
    }
}
?>