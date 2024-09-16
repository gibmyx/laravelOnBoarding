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

    public function crear($data)
    {
        return People::create($data);
    }

    public function buscar($id)
    {
        return People::find($id);
    }

    public function editar($id)
    {
        $people = People::find($id);
        $item = request()->all();
        $people->update($item);
        return $people;
    }

    public function eliminar($id)
    {
        return People::destroy($id);
    }
}