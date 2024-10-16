<?php

namespace App\Exceptions;

use Exception;

class EmptyItemsException extends Exception
{
    public function __construct(string $message = '')
    {
        $message = 'La factura debe tener al menos un ítem';
        parent::__construct($message);
    }
}
