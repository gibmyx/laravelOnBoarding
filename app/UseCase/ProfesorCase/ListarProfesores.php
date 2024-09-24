<?php

namespace App\UseCase\ProfesorCase;

use App\Repository\ProfesorRepository\ProfesorInterface;
use Illuminate\Database\Eloquent\Collection;

class ListarProfesores{
    private $repository;
    
    public function __construct(ProfesorInterface $repository)
    {
        $this->repository = $repository;
    }

    public function ListarProfesores():Collection
    {
        $profesores = $this->repository->ListarProfesores();
        return $profesores; 
    }
    
}

?>