<?php

namespace App\UseCase\Professor;

use App\Repository\ProfessorRepository;
use App\Models\ProfessorModel;
use App\Interfaces\ProfessorRepositoryInterface;

class EliminarProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->eliminar($id);
    }
}