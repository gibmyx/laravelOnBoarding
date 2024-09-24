<?php

namespace App\Repository;

use App\Models\People;
use Illuminate\Database\Eloquent\Collection;

class PeopleRepository
{
    public function mostrar(): Collection
    {
        return People::all();
    }

    public function crear(array $data): People
    {
        return People::create($data);
    }

    public function buscar(int $id): ?People
    {
        return People::find($id);
    }

    public function editar(int $id): ?People
    {
        $people = People::find($id);
        $item = request()->all();
        $people->update($item);
        return $people;
    }

    public function eliminar(int $id): void
    {
        People::destroy($id);
    }
}