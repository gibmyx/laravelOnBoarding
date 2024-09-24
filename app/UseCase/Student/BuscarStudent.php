<?php

namespace App\UseCase\Student;

use App\Repository\StudentRepository;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;

class BuscarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): StudentModel
    {
        return $this->repository->buscar($id);
    }
}