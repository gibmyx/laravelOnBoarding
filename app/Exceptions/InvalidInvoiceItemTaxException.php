<?php

namespace App\Exceptions;

use Exception;

class InvalidInvoiceItemTaxException extends Exception
{
    public function __construct(private string $item_id)
    {
        parent::__construct("The item with id {$this->item_id} has an invalid tax value");
    }
}
