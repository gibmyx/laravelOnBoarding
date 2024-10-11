<?php

namespace App\Repository;

use App\Interfaces\ProfessorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\ProfessorModel;

class ProfessorRepository implements ProfessorRepositoryInterface
{
    public function mostrar(): Collection
    {
        return ProfessorModel::all();
    }

    public function crear(array $data): ProfessorModel
    {
        return ProfessorModel::create($data);
    }

    public function buscar(int $id): ?ProfessorModel
    {
        return ProfessorModel::find($id);
    }

    public function editar(ProfessorModel $professor, array $data): ?ProfessorModel
    {
        $professor->update($data);
        return $professor;
    }

    public function eliminar(ProfessorModel $professor): void
    {
        ProfessorModel::destroy($professor);
    }
}
