<?php

namespace App\Exceptions;

use Exception;

class ProfessorNotFoundException extends Exception
{
    public function __construct(int $id, string $message = '')
    {
        $message = "El Profesor con ID: $id no ha sido encontrado";
        parent::__construct($message);
    }
}
