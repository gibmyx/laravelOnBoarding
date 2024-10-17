<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

final class InvoiceNotFoundException extends \Exception
{
    public function __construct(string $id)
    {
        parent::__construct("Invoice with id: {$id} not found", JsonResponse::HTTP_NOT_FOUND);
    }

}