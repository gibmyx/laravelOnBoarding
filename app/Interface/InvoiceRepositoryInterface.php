<?php

namespace App\Interface;

use App\Entities\Invoice;

interface InvoiceRepositoryInterface
{
    public function create(array $data): void;

    public function search(string $id): ?Invoice;

    public function update(Invoice $invoice): Invoice;

    public function delete(string $id): void;
}
