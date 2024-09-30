<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\UseCase\Student\CrearStudent;
use App\UseCase\Student\MostrarStudent;
use App\UseCase\Student\EditarStudent;
use App\UseCase\Student\EliminarStudent;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\DTO\StudentDTO;
use App\Repository\StudentRepository;

class StudentController extends Controller
{
    private StudentRepository $repository;
 
    public function __construct()
    {
        $this->repository = (new StudentRepository());
    }

    public function create(): View
    {
        return view('student.create');
    }

    public function success(): View
    {
        $useCase = new CrearStudent($this->repository);
        $data = request()->all();
        $dto = StudentDTO::fromArray($data);
        $useCase->execute($dto);
        return view('student.success');
    }

    public function listar(): View
    {
        $useCase = new MostrarStudent($this->repository);
        $students = $useCase->execute();
        return view('student.listar', compact('students'));
    }

    public function editar(int $id): View
    {
        $useCase = new MostrarStudent($this->repository);
        $student = $useCase->execute()->find($id);
        return view('student.editar', compact('student'));
    }

    public function update(int $id): RedirectResponse
    {
        $useCase = new EditarStudent($this->repository);
        $data = request()->all();
        $dto = StudentDTO::fromArray($data);
        $useCase->execute($id, $dto);
        return redirect('/student/listar');
    }

    public function eliminar(int $id): RedirectResponse
    {
        $useCase = new EliminarStudent($this->repository);
        $useCase->execute($id);
        return redirect('/student/listar');
    }
}
