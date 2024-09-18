<?php

namespace App\UseCase;

use App\Repository\PeopleRepository;
use Illuminate\Database\Eloquent\Collection;

class MostrarPeople
{
    public function __construct(private $repository = new PeopleRepository())
    {
    }

    public function execute(): Collection
    {
        return $this->repository->mostrar();
    }
}