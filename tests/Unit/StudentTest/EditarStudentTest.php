<?php

namespace Tests\Unit\StudentTest;

use Tests\TestCase;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\UseCase\Student\EditarStudent;
use App\DTO\StudentDTO;
use App\Exceptions\StudentNotFoundException;
use Mockery;

class EditarStudentTest extends TestCase
{
    public function test_editar_student()
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

        $mock->shouldReceive('buscar')
        ->with($dto->id)
        ->andReturn($studentModel);

        $mock->shouldReceive('editar')
        ->with($studentModel, $dto->toArray())
        ->andReturn($studentModel);

        $studentEditar = new EditarStudent($mock);

        $studentEditar->execute($dto->id, $dto);

        $this->assertTrue(true);
    }

    public function test_student_not_found()
    {
        $this->expectException(StudentNotFoundException::class);

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

        $mock->shouldReceive('buscar')
        ->with($dto->id)
        ->andReturn(null);

        $mock->shouldReceive('editar')
        ->with($dto->id, $dto->toArray())
        ->andReturn(null);

        $studentEditar = new EditarStudent($mock);

        $this->expectException(StudentNotFoundException::class);

        $studentEditar->execute($dto->id, $dto);
    }
}
