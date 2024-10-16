<?php

namespace App\Exceptions\Invoice;

use Exception;

class TotalMountException extends Exception
{

    public function __construct(string $message = 'Una factura no puede tener monto 0', int $code = 404)
    {
        parent::__construct($message, $code);
    }

}