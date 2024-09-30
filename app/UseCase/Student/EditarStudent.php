<?php

namespace App\UseCase\Student;

use App\Repository\StudentRepository;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\DTO\StudentDTO;

class EditarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, StudentDTO $dto): StudentModel
    {
        return $this->repository->editar($id, $dto->toArray());
    }
}