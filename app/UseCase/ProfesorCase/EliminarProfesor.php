<?php

namespace App\UseCase\ProfesorCase;

use App\Repository\ProfesorRepository\ProfesorInterface;

class EliminarProfesor{
    private $repository;

    public function __construct(ProfesorInterface $repository)
    {
        $this->repository = $repository;
    }

    public function EliminarProfesor(int $cedula): void
    {
        $this->repository->EliminarProfesor($cedula);
    }
}