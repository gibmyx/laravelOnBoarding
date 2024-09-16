<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;
use App\Models\People;

class BuscarPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute($id): People
    {
        return $this->repository->buscar($id);
    }
}