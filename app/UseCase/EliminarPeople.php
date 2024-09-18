<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;

class EliminarPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute(int $id): void
    {
        $this->repository->eliminar($id);
    }
}