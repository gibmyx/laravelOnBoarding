<?php

namespace Tests\Unit\ProfessorTest;

use App\Interfaces\ProfessorRepositoryInterface;
use App\UseCase\Professor\MostrarProfessor;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Tests\TestCase;

class MostrarProfessorTest extends TestCase
{
    public function test_mostrar_professor()
    {
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

        $mock = Mockery::mock(ProfessorRepositoryInterface::class);

        $mock->shouldReceive('mostrar')
        ->andReturn(new Collection([$data]));

        $mostrarProfessor = new MostrarProfessor($mock);

        $mostrarProfessor->execute();

        $this->assertTrue(true);
    }
}
