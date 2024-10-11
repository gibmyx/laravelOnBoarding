<?php

namespace Tests\Unit\ProfessorTest;

use App\Exceptions\ProfessorNotFoundException;
use App\Interfaces\ProfessorRepositoryInterface;
use App\Models\ProfessorModel;
use App\UseCase\Professor\BuscarProfessor;
use Mockery;
use Tests\TestCase;

class BuscarProfessorTest extends TestCase
{
    public function test_buscar_professor()
    {
        $professorModel = new ProfessorModel([
            'id' => 1,
            'name' => 'Victor',
            'lastname' => 'Marcella',
            'cedula' => 123456,
            'age' => 30,
            'gender' => 'Masculino',
            'grade' => '1er grado',
            'n_subjects' => 10,
            'notes' => 10,
        ]);
        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with($professorModel->id)
        ->andReturn($professorModel);

        $buscarProfessor = new BuscarProfessor($mock);

        $buscarProfessor->execute($professorModel->id);

        $this->assertTrue(true);
    }

    public function test_professor_not_found()
    {
        $this->expectException(ProfessorNotFoundException::class);

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with(1)
        ->andReturn(null);

        $buscarProfessor = new BuscarProfessor($mock);

        $buscarProfessor->execute(1);
    }
}
