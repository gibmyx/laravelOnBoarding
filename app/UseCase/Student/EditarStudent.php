<?php

namespace App\UseCase\Student;

use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\DTO\StudentDTO;
use App\Exceptions\StudentNotFoundException;

class EditarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, StudentDTO $dto): ?StudentModel
    {
        $student = $this->repository->buscar($id);

        if (is_null($student)) {
            throw new StudentNotFoundException($id);
        }

        return $this->repository->editar($student, $dto->toArray());
    }
}
