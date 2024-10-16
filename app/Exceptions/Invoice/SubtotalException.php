<?php

namespace App\Exceptions\Invoice;

use Exception;

class SubtotalException extends Exception
{

    public function __construct(string $message = 'El subtotal de la factura no es igual al subtotal de todos los items sumados', int $code = 404)
    {
        parent::__construct($message, $code);
    }

}