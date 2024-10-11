<?php

namespace App\UseCase\Student;

use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\StudentRepositoryInterface;

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
