<?php

namespace App\UseCase\Student;

use App\Exceptions\StudentNotFoundException;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;

class BuscarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?StudentModel
    {
        $student = $this->repository->buscar($id);

        if (is_null($student)) {
            throw new StudentNotFoundException($id);
        }

        return $student;
    }
}
