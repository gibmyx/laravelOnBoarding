<?php

namespace App\UseCase\Student;

use App\Repository\StudentRepository;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\StudentRepositoryInterface;
use App\DTO\StudentDTO;

class MostrarStudent
{
    private $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): Collection
    {
        return $this->repository->mostrar();
    }
}