<?php

namespace App\UseCase\Professor;

use App\Repository\ProfessorRepository;
use App\Models\ProfessorModel;
use App\Interfaces\ProfessorRepositoryInterface;
use App\DTO\ProfessorDTO;

class EditarProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, ProfessorDTO $dto): ProfessorModel
    {
        return $this->repository->editar($id, $dto->toArray());
    }
}