<?php

namespace App\UseCase\Professor;

use App\Repository\ProfessorRepository;
use App\Models\ProfessorModel;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\ProfessorRepositoryInterface;

class MostrarProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): Collection
    {
        return $this->repository->mostrar();
    }
}