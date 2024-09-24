<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\StudentModel;

interface StudentRepositoryInterface
{
    public function mostrar(): Collection;

    public function crear(array $data): StudentModel;

    public function buscar(int $id): StudentModel;

    public function editar(int $id, array $data): StudentModel;

    public function eliminar(int $id): void;
}