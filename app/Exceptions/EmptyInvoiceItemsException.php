<?php

namespace App\Exceptions;

use Exception;

class EmptyInvoiceItemsException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invoice items cannot be empty');
    }
}
