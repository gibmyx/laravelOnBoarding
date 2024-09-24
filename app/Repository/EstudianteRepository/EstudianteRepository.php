<?php

namespace App\Repository\EstudianteRepository;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use App\Models\Estudiante;
use App\Models\Persona;
use App\Repository\EstudianteRepository\EstudianteInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EstudianteRepository implements EstudianteInterface{

    public function ListarEstudiantes():Collection
    {
        $estudiante = Estudiante::all();
        return $estudiante;
    }

    public function CrearEstudiante(DTOEstudiante $DTOestudiante):void
    {
        Estudiante::create([
            'nombre' => $DTOestudiante->getNombre(),
            'apellido' => $DTOestudiante->getApellido(),
            'cedula' => $DTOestudiante->getCedula(),
            'edad' => $DTOestudiante->getEdad(),
            'genero' => $DTOestudiante->getGenero(),
            'grado' => $DTOestudiante->getGrado(),
            'cantidad_materia' => $DTOestudiante->getCantidadMateria(),
            'nota' => $DTOestudiante->getNota()
        ]);
    }

    public function BuscarEstudiante(int $cedula):Estudiante
    {
        $estudiante = Estudiante::where('cedula', $cedula)->first();
        return $estudiante;
    }

    public function ModificarEstudiante(int $cedula, DTOEstudiante $DTOestudiante): void
    {
        $estudianteActual = $this->BuscarEstudiante($cedula);
        $estudianteActual->fromDTO($DTOestudiante);
        $estudianteActual->save();
    }

    public function EliminarEstudiante(int $cedula): void
    {
        $estudiante = $this->BuscarEstudiante($cedula);
        $estudiante->delete();
    }
}
?>