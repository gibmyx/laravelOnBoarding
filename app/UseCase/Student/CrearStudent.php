<?php

namespace App\UseCase\Student;

use App\Models\StudentModel;
use App\DTO\StudentDTO;
use App\Interfaces\StudentRepositoryInterface;

class CrearStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(StudentDTO $dto): StudentModel
    {
        return $this->repository->crear($dto->toArray());
    }
}
