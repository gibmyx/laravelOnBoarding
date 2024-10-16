<?php

namespace App\Exceptions\Invoice;

use Exception;

class TotalException extends Exception
{

    public function __construct(string $message = 'El total de la factura no es igual al total de todos los items sumados', int $code = 404)
    {
        parent::__construct($message, $code);
    }

}