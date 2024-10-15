<?php

namespace App\Exceptions;

use Exception;

class InvalidInvoiceTotalException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invoice total cannot be zero.');
    }
}
