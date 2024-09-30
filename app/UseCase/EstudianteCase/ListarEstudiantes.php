<?php

namespace App\UseCase\EstudianteCase;

use App\Repository\EstudianteRepository\EstudianteInterface;
use Illuminate\Database\Eloquent\Collection;

class ListarEstudiantes{
    private $repository;

    public function __construct(EstudianteInterface $repository)
    {
        $this->repository = $repository;
    }

    public function ListarEstudiantes():Collection
    {
        $estudiantes = $this->repository->ListarEstudiantes();
        return $estudiantes; 
    }   
}

?>