<?php

namespace App\UseCase\ProfesorCase;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOProfesor;
use App\Models\Profesor;
use App\Repository\ProfesorRepository\ProfesorInterface;

class ModificarProfesor{
    private $repository;

    public function __construct(ProfesorInterface $repository)
    {
        $this->repository = $repository;
    }

    public function BuscarProfesor(int $cedula):Profesor
    {
        $estudiante = $this->repository->BuscarProfesor($cedula);
        return $estudiante;
    }

    public function ModificarProfesor(DTOProfesor $DTOprofesor, int $cedula):void
    {
        $this->repository->ModificarProfesor($cedula, $DTOprofesor);
    }
}