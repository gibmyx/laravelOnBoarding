<?php

namespace App\Exceptions;

use Exception;

class InvalidTotalException extends Exception
{
    public function __construct(string $message = '')
    {
        $message = 'El total no puede ser cero o menor';
        parent::__construct($message);
    }
}
