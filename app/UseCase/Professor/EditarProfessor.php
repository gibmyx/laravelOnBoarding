<?php

namespace App\UseCase\Professor;

use App\Models\ProfessorModel;
use App\Interfaces\ProfessorRepositoryInterface;
use App\DTO\ProfessorDTO;
use App\Exceptions\ProfessorNotFoundException;

class EditarProfessor
{
    private $repository;

    public function __construct(ProfessorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, ProfessorDTO $dto): ?ProfessorModel
    {
        $professor = $this->repository->buscar($id);

        if (is_null($professor)) {
            throw new ProfessorNotFoundException($id);
        }

        return $this->repository->editar($professor, $dto->toArray());
    }
}
