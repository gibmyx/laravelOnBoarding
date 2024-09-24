<?php

namespace App\Repository\EstudianteRepository;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface EstudianteInterface{
    public function ListarEstudiantes():Collection;
    public function BuscarEstudiante(int $cedula):Estudiante;
    public function CrearEstudiante(DTOEstudiante $estudiante):void;
    public function ModificarEstudiante(int $cedula, DTOEstudiante $request):void;
    public function EliminarEstudiante(int $cedula):void;
}
?>