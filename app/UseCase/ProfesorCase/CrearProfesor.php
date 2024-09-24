<?php

namespace App\UseCase\ProfesorCase;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOProfesor;
use App\Repository\ProfesorRepository\ProfesorInterface;

class CrearProfesor{
    private $repository;

    public function __construct(ProfesorInterface $repository)
    {
        $this->repository = $repository;
    }

    public function CrearProfesor(DTOProfesor $DTOprofesor):void
    {
        $this->repository->CrearProfesor($DTOprofesor);
    }
}