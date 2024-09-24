<?php

namespace App\Http\Controllers;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOprofesor;
use App\Repository\ProfesorRepository\ProfesorRepository;
use App\UseCase\ProfesorCase\ListarProfesores;
use App\UseCase\ProfesorCase\CrearProfesor;
use App\UseCase\ProfesorCase\EliminarProfesor;
use App\UseCase\ProfesorCase\ModificarProfesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = (new ProfesorRepository());
    }

    public function index():View
    {
        $listaProfesores = new ListarProfesores($this->repository);
        $profesores = $listaProfesores->ListarProfesores();
        return view('Profesor/ListaProfesores', ['profesor' => $profesores]);
    }
    
    public function crear():View
    {
        return view('Profesor/CrearProfesor');
    }

    public function guardar(Request $request):RedirectResponse
    {
        $profesor = new DTOProfesor($request);
        $crearProfesor = new CrearProfesor($this->repository);
        $crearProfesor->CrearProfesor($profesor);
        return redirect('/Profesores');
    }
    
    public function modificar(int $cedula):View
    {
        $modificarProfesor = new ModificarProfesor($this->repository);
        $profesor = $modificarProfesor->BuscarProfesor($cedula);
        return view('Profesor/ModificarProfesor', ['profesor' => $profesor]);
    }
    
    public function guardarModificacion(Request $request, int $cedula):RedirectResponse
    {
        $profesor = new DTOprofesor($request);
        $modificarProfesor = new ModificarProfesor($this->repository);
        $modificarProfesor->BuscarProfesor($cedula);
        $modificarProfesor->ModificarProfesor($profesor, $cedula);
        return redirect("/Profesores");
    }
    
    public function eliminar(int $cedula):RedirectResponse
    {   
        $estudiante = new EliminarProfesor($this->repository);
        $estudiante->EliminarProfesor($cedula);
        return redirect("/Profesores");
    }
}
