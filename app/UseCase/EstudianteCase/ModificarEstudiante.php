<?php

namespace App\UseCase\EstudianteCase;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use App\Models\Estudiante;
use App\Repository\EstudianteRepository\EstudianteInterface;

class ModificarEstudiante{
    private $repository;

    public function __construct(EstudianteInterface $repository)
    {
        $this->repository = $repository;
    }

    public function BuscarEstudiante(int $cedula):Estudiante
    {
        $estudiante = $this->repository->BuscarEstudiante($cedula);
        return $estudiante;
    }

    public function ModificarEstudiante(DTOEstudiante $DTOEstudiante, int $cedula):void
    {
        $this->repository->ModificarEstudiante($cedula, $DTOEstudiante);
    }
}