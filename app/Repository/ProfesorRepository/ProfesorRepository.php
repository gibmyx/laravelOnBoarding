<?php

namespace App\Repository\ProfesorRepository;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOProfesor;
use App\Models\Profesor;
use App\Repository\ProfesorRepository\ProfesorInterface;
use Illuminate\Database\Eloquent\Collection;

class ProfesorRepository implements ProfesorInterface{

    public function ListarProfesores():Collection
    {
        $profesor = Profesor::all();
        return $profesor;
    }

    public function CrearProfesor(DTOProfesor $DTOprofesor):void
    {
        Profesor::create([
            'nombre' => $DTOprofesor->getNombre(),
            'apellido' => $DTOprofesor->getApellido(),
            'cedula' => $DTOprofesor->getCedula(),
            'edad' => $DTOprofesor->getEdad(),
            'genero' => $DTOprofesor->getGenero(),
            'titulo_universitario' => $DTOprofesor->getTituloUniversitario(),
            'materia_asignada' => $DTOprofesor->getMateriaAsignada(),
            'horas_asignadas' => $DTOprofesor->getHorasAsignadas()
        ]);
    }

    public function BuscarProfesor(int $cedula):Profesor
    {
        $profesor = Profesor::where('cedula', $cedula)->first();
        return $profesor;
    }

    public function ModificarProfesor(int $cedula, DTOProfesor $DTOprofesor): void
    {
        $profesorActual = $this->BuscarProfesor($cedula);
        $profesorActual->fromDTO($DTOprofesor);
        $profesorActual->update();
    }

    public function EliminarProfesor(int $cedula): void
    {
        $profesor = $this->BuscarProfesor($cedula);
        $profesor->delete();
    }
}
?>