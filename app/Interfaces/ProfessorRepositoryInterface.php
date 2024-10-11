<?php

namespace App\Interfaces;

use App\Models\ProfessorModel;
use Illuminate\Database\Eloquent\Collection;

interface ProfessorRepositoryInterface
{
    public function mostrar(): Collection;

    public function crear(array $data): ProfessorModel;

    public function buscar(int $id): ?ProfessorModel;

    public function editar(ProfessorModel $professor, array $data): ?ProfessorModel;

    public function eliminar(ProfessorModel $professor): void;
}
