<?php

namespace App\Exceptions;

use Exception;

class InvoiceNotFoundException extends Exception
{
    public function __construct(string $id, string $message = '')
    {
        $message = "Factura con ID: $id no encontrada";
        parent::__construct($message);
    }
}
