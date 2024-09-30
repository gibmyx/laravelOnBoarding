<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessorModel;
use App\UseCase\Professor\CrearProfessor;
use App\UseCase\Professor\MostrarProfessor;
use App\UseCase\Professor\EditarProfessor;
use App\UseCase\Professor\EliminarProfessor;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repository\ProfessorRepository;
use App\Interfaces\ProfessorRepositoryInterface;
use App\DTO\ProfessorDTO;

class ProfessorController extends Controller
{
    private ProfessorRepository $repository;

    public function __construct()
    {
        $this->repository = (new ProfessorRepository());
    }

    public function create(): View
    {
        return view('professor.create');
    }

    public function success(): View
    {
        $useCase = new CrearProfessor($this->repository);
        $data = request()->all();
        $dto = ProfessorDTO::fromArray($data);
        $useCase->execute($dto);
        return view('professor.success');
    }

    public function listar(): View
    {
        $useCase = new MostrarProfessor($this->repository);
        $professors = $useCase->execute();
        return view('professor.listar', compact('professors'));
    }

    public function editar(int $id): View
    {
        $useCase = new MostrarProfessor($this->repository);
        $professor = $useCase->execute()->find($id);
        return view('professor.editar', compact('professor'));
    }

    public function update(int $id): RedirectResponse
    {
        $useCase = new EditarProfessor($this->repository);
        $data = request()->all();
        $dto = ProfessorDTO::fromArray($data);
        $useCase->execute($id, $dto);
        return redirect('professor/listar');
    }

    public function eliminar(int $id): RedirectResponse
    {
        $useCase = new EliminarProfessor($this->repository);
        $useCase->execute($id);
        return redirect('professor/listar');
    }
    
}