<?php

namespace App\Exceptions\Invoice;

use Exception;

class ImpuestoException extends Exception
{

    public function __construct(string $message = 'El impuesto de la factura no es igual al impuesto de todos los items sumados', int $code = 404)
    {
        parent::__construct($message, $code);
    }

}