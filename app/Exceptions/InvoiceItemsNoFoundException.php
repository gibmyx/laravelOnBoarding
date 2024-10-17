<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

final class InvoiceItemsNoFoundException extends Exception
{
    public function __construct(string $codigo)
    {
        parent::__construct($codigo, JsonResponse::HTTP_BAD_REQUEST);
    }
}