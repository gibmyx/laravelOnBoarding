<?php

namespace App\UseCase\Professor;

use App\Models\ProfessorModel;
use App\Interfaces\ProfessorRepositoryInterface;
use App\DTO\ProfessorDTO;

class CrearProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(ProfessorDTO $dto): ProfessorModel
    {
        return $this->repository->crear($dto->toArray());
    }
}
