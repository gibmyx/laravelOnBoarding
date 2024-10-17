<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Entity\Invoice;

interface InvoiceRepository
{

    public function create(Invoice $invoice): void;

    public function find(string $id): ?Invoice;

    public function update(Invoice $invoice);

}