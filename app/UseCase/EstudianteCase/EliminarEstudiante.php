<?php

namespace App\UseCase\EstudianteCase;

use App\Repository\EstudianteRepository\EstudianteInterface;

class EliminarEstudiante{
    private $repository;

    public function __construct(EstudianteInterface $repository)
    {
        $this->repository = $repository;
    }
    public function EliminarEstudiante(int $cedula): void
    {
        $this->repository->EliminarEstudiante($cedula);
    }

}