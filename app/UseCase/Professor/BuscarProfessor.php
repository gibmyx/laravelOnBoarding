<?php

namespace App\UseCase\Professor;

use App\Repository\ProfessorRepository;
use App\Models\ProfessorModel;
use App\Interfaces\ProfessorRepositoryInterface;

class BuscarProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ProfessorModel
    {
        return $this->repository->buscar($id);
    }
}