<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;
use App\Models\People;

class CrearPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute($data): People
    {
        return $this->repository->crear($data);
    }
}