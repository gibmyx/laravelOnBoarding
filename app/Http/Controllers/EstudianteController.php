<?php

namespace App\Http\Controllers;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use App\Repository\EstudianteRepository\EstudianteRepository;
use App\UseCase\EstudianteCase\CrearEstudiante;
use App\UseCase\EstudianteCase\EliminarEstudiante;
use App\UseCase\EstudianteCase\ListarEstudiantes;
use App\UseCase\EstudianteCase\ModificarEstudiante;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstudianteController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = (new EstudianteRepository());
    }

    public function index()
    {
        $estudiante = new ListarEstudiantes($this->repository);
        $estudiante = $estudiante->ListarEstudiantes(); 
        return view('Estudiante/ListaEstudiantes', ['estudiante' => $estudiante]);
    }
    
    public function crear():View
    {
        return view('Estudiante/CrearEstudiante');
    }

    public function guardar(Request $request)
    {
        $estudiante = new DTOEstudiante($request);
        $crearEstudiante = new CrearEstudiante($this->repository);
        $crearEstudiante->CrearEstudiante($estudiante);
        return redirect('/Estudiantes');
    }
    
    public function modificar(int $cedula)
    {
        $modificarEstudiante = new ModificarEstudiante($this->repository);
        $estudiante = $modificarEstudiante->BuscarEstudiante($cedula);
        return view('Estudiante/ModificarEstudiante', ['estudiante' => $estudiante]);
    }
    
    public function guardarModificacion(int $cedula,Request $request)
    {
        $estudiante = new DTOEstudiante($request);
        $modificarEstudiante = new ModificarEstudiante($this->repository);
        $modificarEstudiante->ModificarEstudiante($estudiante, $cedula);
        return redirect("/Estudiantes");
    }
    
    public function eliminar(int $cedula)
    {   
        $estudiante = new EliminarEstudiante($this->repository);
        $estudiante->EliminarEstudiante($cedula);
        return redirect("/Estudiantes");
    }
}