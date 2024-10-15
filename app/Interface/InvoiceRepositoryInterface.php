<?php

namespace App\Interface;

use App\Entity\Invoice;

interface InvoiceRepositoryInterface
{
    public function save(Invoice $invoice): void;

    public function search(string $id): ?Invoice;

    public function update(string $id, Invoice $invoice): void;
}