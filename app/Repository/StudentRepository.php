<?php

namespace App\Repository;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentRepositoryInterface
{
    public function mostrar(): Collection
    {
        return StudentModel::all();
    }

    public function crear(array $data): StudentModel
    {
        return StudentModel::create($data);
    }

    public function buscar(int $id): StudentModel
    {
        return StudentModel::find($id);
    }

    public function editar(int $id, array $data): StudentModel
    {
        $student = StudentModel::find($id);
        $student->update($data);
        return $student;
    }

    public function eliminar(int $id): void
    {
        StudentModel::destroy($id);
    }
}