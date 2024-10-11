<?php

namespace Tests\Unit\ProfessorTest;

use App\DTO\ProfessorDTO;
use App\Exceptions\ProfessorNotFoundException;
use App\Interfaces\ProfessorRepositoryInterface;
use App\Models\ProfessorModel;
use App\UseCase\Professor\EditarProfessor;
use Mockery;
use Tests\TestCase;

class EditarProfessorTest extends TestCase
{
    public function test_editar_professor()
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

        $data = [
            'id' => 1,
            'name' => 'Victor',
            'lastname' => 'Marcella',
            'cedula' => 123456,
            'age' => 30,
            'gender' => 'Masculino',
            'u_degrees' => 'Licenciatura en artes',
            'a_subjects' => 'Musica',
            'hours_a' => 10,
        ];

        $dto = ProfessorDTO::fromArray($data);

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with($dto->id)
        ->andReturn($professorModel);

        $mock->shouldReceive('editar')
        ->with($professorModel, $dto->toArray())
        ->andReturn($professorModel);

        $editarProfessor = new EditarProfessor($mock);

        $editarProfessor->execute($dto->id, $dto);

        $this->assertTrue(true);
    }

    public function test_professor_not_found()
    {
        $this->expectException(ProfessorNotFoundException::class);


        $data = [
            'id' => 1,
            'name' => 'Victor',
            'lastname' => 'Marcella',
            'cedula' => 123456,
            'age' => 30,
            'gender' => 'Masculino',
            'u_degrees' => 'Licenciatura en artes',
            'a_subjects' => 'Musica',
            'hours_a' => 10,
        ];

        $dto = ProfessorDTO::fromArray($data);

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with(1)
        ->andReturn(null);

        $editarProfessor = new EditarProfessor($mock);

        $editarProfessor->execute(1, $dto);
    }
}
