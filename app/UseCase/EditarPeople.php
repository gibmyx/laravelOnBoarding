<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;

class EditarPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute($id)
    {
        return $this->repository->editar($id);
    }
}