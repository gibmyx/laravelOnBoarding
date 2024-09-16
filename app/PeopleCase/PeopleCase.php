<?php

namespace App\PeopleCase;

use App\Models\Persona;
use App\Repository\PeopleRepository;
use Illuminate\Http\Request;

class PeopleCase{
    public static function ListarPeople(){
        $personas = PeopleRepository::Listar();
        return $personas;
    }

    public static function CrearPeople(Request $request){
        //$persona = new Persona;

        $validarData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255'
        ]);

        PeopleRepository::CrearPersona($validarData);
        /*
        $persona->nombre = $request->nombre->validate([]);
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->descripcion = $request->descripcion;
        */
    }

    public static function BuscarPersona($id){
        $persona = PeopleRepository::BuscarPersona($id);
        return $persona;
    }

    public static function ModificarPersona($request, $id){
        $validarData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255'
        ]);
        PeopleRepository::ModificarPersona($validarData, $id);
    }

    public static function EliminarPersona($id){
        PeopleRepository::EliminarPersona($id);
    }
}

?>