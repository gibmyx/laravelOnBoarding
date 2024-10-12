<?php

namespace App\Interface;

use App\Entity\Invoice;

interface InvoiceRepositoryInterface
{
    public function save(Invoice $invoice): Invoice;

    public function update(string $id, Invoice $invoice): void;
}