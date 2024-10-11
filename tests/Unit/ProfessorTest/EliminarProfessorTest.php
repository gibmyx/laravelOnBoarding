<?php

namespace Tests\Unit\ProfessorTest;

use App\Exceptions\ProfessorNotFoundException;
use App\Interfaces\ProfessorRepositoryInterface;
use App\Models\ProfessorModel;
use App\UseCase\Professor\EliminarProfessor;
use Mockery;
use Tests\TestCase;

class EliminarProfessorTest extends TestCase
{
    public function test_eliminar_professor()
    {
        $professorModel = new ProfessorModel([
            'id' => 1,
            'name' => 'Victor',
            'lastname' => 'Marcella',
            'cedula' => 123456,
            'age' => 30,
            'gender' => 'Masculino',
            'u_degrees' => 'Licenciatura en artes',
            'a_subjects' => 'Musica',
            'hours_a' => 10,
        ]);

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with($professorModel->id)
        ->andReturn($professorModel);

        $mock->shouldReceive('eliminar')
        ->with($professorModel)
        ->andReturnNull();

        $eliminarProfessor = new EliminarProfessor($mock);

        $eliminarProfessor->execute($professorModel->id);

        $this->assertTrue(true);
    }

    public function test_professor_not_found()
    {
        $this->expectException(ProfessorNotFoundException::class);

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with(1)
        ->andReturn(null);

        $eliminarProfessor = new EliminarProfessor($mock);

        $eliminarProfessor->execute(1);
    }
}
