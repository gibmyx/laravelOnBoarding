<?php

namespace Tests\Unit\StudentTest;

use App\Exceptions\StudentNotFoundException;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\StudentModel;
use App\UseCase\Student\BuscarStudent;
use Mockery;
use Tests\TestCase;

class BuscarStudentTest extends TestCase
{
    public function test_buscar_student()
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

        $buscarStudent = new BuscarStudent($mock);

        $buscarStudent->execute($studentModel->id);

        $this->assertTrue(true);
    }

    public function test_student_not_found()
    {

        $this->expectException(StudentNotFoundException::class);

        $mock = Mockery::mock(StudentRepositoryInterface::class);

        $mock->shouldReceive('buscar')
        ->with(1)
        ->andReturn(null);

        $buscarStudent = new BuscarStudent($mock);

        $buscarStudent->execute(1);
    }
}
