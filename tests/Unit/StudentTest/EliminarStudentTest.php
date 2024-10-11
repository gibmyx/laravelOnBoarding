<?php

namespace Tests\Unit\StudentTest;

use App\Exceptions\StudentNotFoundException;
use Tests\TestCase;
use App\Models\StudentModel;
use App\Interfaces\StudentRepositoryInterface;
use App\UseCase\Student\EliminarStudent;
use Mockery;

class EliminarStudentTest extends TestCase
{
    public function test_eliminar_student()
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

        $mock = Mockery::mock(StudentRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with($studentModel->id)
        ->andReturn($studentModel);

        $mock->shouldReceive('eliminar')
        ->with($studentModel)
        ->andReturnNull();

        $eliminarStudent = new EliminarStudent($mock);
        $eliminarStudent->execute($studentModel->id);

        $this->assertTrue(true);
    }

    public function test_student_not_found()
    {
        $this->expectException(StudentNotFoundException::class);

        $mock = Mockery::mock(StudentRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with(1)
        ->andReturn(null);

        $eliminarStudent = new EliminarStudent($mock);

        $eliminarStudent->execute(1);
    }

}
