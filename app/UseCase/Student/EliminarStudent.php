<?php

namespace App\UseCase\Student;

use App\Repository\StudentRepository;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\DTO\StudentDTO;

class EliminarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->eliminar($id);
    }
}