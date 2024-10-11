<?php

namespace App\UseCase\Professor;

use App\Exceptions\ProfessorNotFoundException;
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
        $professor = $this->repository->buscar($id);

        if (is_null($professor)) {
            throw new ProfessorNotFoundException($id);
        }

        $this->repository->eliminar($professor);
    }
}
