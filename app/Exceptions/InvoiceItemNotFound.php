<?php

namespace App\Exceptions;

use Exception;

class InvoiceItemNotFound extends Exception
{
    public function __construct($message = "Invoice item not found", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
