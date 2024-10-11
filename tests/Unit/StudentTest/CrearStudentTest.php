<?php

namespace Tests\Unit\StudentTest;

use Tests\TestCase;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\UseCase\Student\CrearStudent;
use App\DTO\StudentDTO;
use Mockery;

class CrearStudentTest extends TestCase
{
    public function test_crear_student()
    {
        $studentModel = new StudentModel([
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

        $dto = StudentDTO::fromArray($data);

        $mock = Mockery::mock(StudentRepositoryInterface::class);

        $mock->shouldReceive('crear')
        ->with($dto->toArray())
        ->andReturn($studentModel);

        $crearStudent = new CrearStudent($mock);
        $crearStudent->execute($dto);

        $this->assertTrue(true);
    }
}
