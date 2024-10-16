<?php

namespace App\Exceptions;

use Exception;

class InvoiceNotFound extends Exception
{
    public function __construct($message = "Invoice not found", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
