<?php

namespace App\Exceptions;

use Exception;

class StudentNotFoundException extends Exception
{
    public function __construct(int $id, string $message = "")
    {
        $message = "El estudiante con ID: $id no ah sido encontrado";
        parent::__construct($message);
    }
}
