<?php

namespace App\UseCase\People;

use App\Repository\PeopleRepository;
use App\Models\People;

class CrearPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute(array $data): People
    {
        return $this->repository->crear($data);
    }
}