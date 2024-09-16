<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;

class CrearPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute($data)
    {
        return $this->repository->crear($data);
    }
}