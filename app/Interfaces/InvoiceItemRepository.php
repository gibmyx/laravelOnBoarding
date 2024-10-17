<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Entity\InvoiceItem;

interface InvoiceItemRepository
{

    public function save(InvoiceItem $item): void;

    public function findByInvoiceId(string $invoiceId): array;

    public function delete(string $id): void;

}