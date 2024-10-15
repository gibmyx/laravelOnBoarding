<?php

namespace App\Exceptions;

use Exception;

class InvalidInvoiceItemSubtotalException extends Exception
{
    public function __construct(private string $invoice_id)
    {
        parent::__construct("The invoice with id {$this->invoice_id} has an invalid subtotal value");
    }
}
