<?php

namespace App\Repository;

use App\Entity\InvoiceItem;
use App\Interface\InvoiceItemRepositoryInterface;

final class InvoiceItemRepository implements InvoiceItemRepositoryInterface
{
    public function save(InvoiceItem $invoiceItem): void
    {

        //
    }

    public function search(string $id): ?InvoiceItem
    {
        return null;
    }

    public function update(string $id, InvoiceItem $invoiceItem): void
    {
       //
    }
}