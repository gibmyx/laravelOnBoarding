<?php

namespace App\Interface;

use App\Entity\InvoiceItem;

interface InvoiceItemRepositoryInterface
{
    public function save(InvoiceItem $invoiceItem): void;
    public function update(string $id, InvoiceItem $invoiceItem): void;
}