<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index(){

        //$persona = Persona::find(1);
        $persona = Persona::all();
        return view('ListaPersonas', ['persona' => $persona]);
    }

    public function crear(){
        /*$persona = new Persona;

        $persona->nombre = 'PEDro';
        $persona->apellido = 'Lopez';
        $persona->email = 'pedro@gmail.com';
        $persona->descripcion = 'Persona';

        $persona->save();*/
        return view('CrearPersona');
    }

    public function guardar(Request $request){
        $persona = new Persona;

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->descripcion = $request->descripcion;

        $persona->save();
        
        return redirect('/');
    }

    public function modificar($id){
        /*
        $persona = Persona::where('nombre','Miguel')->first();
        $persona->nombre = 'Andres';
        $persona->save();*/
        $persona = Persona::find($id);

        return view('ModificarPersona', compact('persona'));
    }

    public function guardarModificacion(Request $request, $id){
        $persona = Persona::find($id);

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->descripcion = $request->descripcion;
        $persona->save();
        return redirect('/');
    }
    
    public function eliminar($id){
        $persona = Persona::find($id);
        $persona->delete();

        return redirect("/");
    }
}
