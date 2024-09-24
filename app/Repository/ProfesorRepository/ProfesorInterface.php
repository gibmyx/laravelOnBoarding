<?php

namespace App\Repository\ProfesorRepository;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOProfesor;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Collection;

interface ProfesorInterface{
    public function ListarProfesores():Collection;
    public function BuscarProfesor(int $cedula):Profesor;
    public function CrearProfesor(DTOProfesor $profesor):void;
    public function ModificarProfesor(int $cedula, DTOProfesor $profesor):void;
    public function EliminarProfesor(int $cedula):void;
}

?>