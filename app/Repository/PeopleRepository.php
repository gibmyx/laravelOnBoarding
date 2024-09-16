<?php

namespace App\Repository;

use App\Models\Persona;
use Illuminate\Support\Collection;

class PeopleRepository{

    public static function Listar():Collection{
        $persona = Persona::all();
        return $persona;
    }

    public static function CrearPersona(Array $validarData):void{
        $persona = new Persona;
        $persona->nombre = $validarData['nombre'];
        $persona->apellido = $validarData['apellido'];
        $persona->email = $validarData['email'];
        $persona->descripcion = $validarData['descripcion'];
        $persona->save();
    }

    public static function BuscarPersona($id) /*Retorna objeto */ {
        $persona = Persona::find($id);
        return $persona;
    }

    public static function ModificarPersona($validarData, $id){
        $persona = Persona::find($id);
        $persona->nombre = $validarData['nombre'];
        $persona->apellido = $validarData['apellido'];
        $persona->email = $validarData['email'];
        $persona->descripcion = $validarData['descripcion'];
        $persona->save();
    }

    public static function EliminarPersona($id){
        $persona = Persona::find($id);
        $persona->delete();
    }
}
?>