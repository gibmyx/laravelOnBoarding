<?php

namespace App\Exceptions\Invoice;

use Exception;

class NoItemsException extends Exception
{

    public function __construct(string $message = 'No hay items en la factura', int $code = 404)
    {
        parent::__construct($message, $code);
    }

}