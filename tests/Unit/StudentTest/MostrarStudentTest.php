<?php

namespace Tests\Unit\StudentTest;

use Tests\TestCase;
use App\Interfaces\StudentRepositoryInterface;
use App\UseCase\Student\MostrarStudent;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class MostrarStudentTest extends TestCase
{
    public function test_mostrar_student()
    {
        $data = [
            'id' => 1,
            'name' => 'Victor',
            'lastname' => 'Marcella',
            'cedula' => 123456,
            'age' => 30,
            'gender' => 'Masculino',
            'grade' => '1er grado',
            'n_subjects' => 10,
            'notes' => 10,
        ];

        $mock = Mockery::mock(StudentRepositoryInterface::class);

        $mock->shouldReceive('mostrar')
        ->andReturn(new Collection([$data]));

        $mostrarStudent = new MostrarStudent($mock);

        $mostrarStudent->execute();

        $this->assertTrue(true);
    }
}
