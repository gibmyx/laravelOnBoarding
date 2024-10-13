<?php

namespace App\UseCase\Invoice;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Interface\InvoiceRepositoryInterface;

final class CreateInvoice
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function execute(InvoiceDTO $invoiceDto): Invoice
    {
        $invoice = new Invoice(
            $invoiceDto->id,
            $invoiceDto->code,
            $invoiceDto->status,
            $invoiceDto->provider_id,
            $invoiceDto->subtotal,
            $invoiceDto->tax,
            $invoiceDto->discount,
            $invoiceDto->total
        );
        
        return $this->invoiceRepository->save($invoice);   
    }
}