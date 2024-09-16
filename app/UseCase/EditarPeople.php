<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;
use App\Models\People;

class EditarPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute($id): People
    {
        return $this->repository->editar($id);
    }
}