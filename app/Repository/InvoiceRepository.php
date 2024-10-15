<?php

namespace App\Repository;

use App\Entity\Invoice;
use App\Interface\InvoiceRepositoryInterface;
use App\Models\Invoice as ModelsInvoice;

final class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function save(Invoice $invoice): void
    {

        $invoiceData = [
            'id' => $invoice->id(),
            'code' => $invoice->code(),
            'status' => $invoice->status(),
            'provider_id' => $invoice->providerId(),
            'subtotal' => $invoice->subtotal(),
            'tax' => $invoice->tax(),
            'discount' => $invoice->discount(),
            'total' => $invoice->total()
        ];

        ModelsInvoice::create($invoiceData);
    }

    public function search(string $id): ?Invoice
    {
        return null;
    }

    public function update(string $id, Invoice $invoice): void
    {
       // return //;
    }
}