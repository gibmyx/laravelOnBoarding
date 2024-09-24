<?php

namespace App\UseCase\EstudianteCase;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use App\Repository\EstudianteRepository\EstudianteInterface;

class CrearEstudiante{
    private $repository;

    public function __construct(EstudianteInterface $repository)
    {
        $this->repository = $repository;
    }

    public function CrearEstudiante(DTOEstudiante $nuevoEstudiante):void
    {
        $this->repository->CrearEstudiante($nuevoEstudiante);
    }

}