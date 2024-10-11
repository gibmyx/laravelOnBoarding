<?php

namespace Tests\Unit\ProfessorTest;

use App\DTO\ProfessorDTO;
use App\Interfaces\ProfessorRepositoryInterface;
use App\Models\ProfessorModel;
use App\UseCase\Professor\CrearProfessor;
use Mockery;
use Tests\TestCase;

class CrearProfessorTest extends TestCase
{
    public function test_crear_professor()
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

        $mock->shouldReceive('crear')
        ->with($dto->toArray())
        ->andReturn($professorModel);

        $crearProfessor = new CrearProfessor($mock);

        $crearProfessor->execute($dto);

        $this->assertTrue(true);
    }
}
