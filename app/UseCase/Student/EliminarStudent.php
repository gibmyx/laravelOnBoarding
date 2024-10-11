<?php

namespace App\UseCase\Student;

use App\Interfaces\StudentRepositoryInterface;
use App\Exceptions\StudentNotFoundException;

class EliminarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $student = $this->repository->buscar($id);

        if (is_null($student)) {
            throw new StudentNotFoundException($id);
        }

        $this->repository->eliminar($student);
    }
}
