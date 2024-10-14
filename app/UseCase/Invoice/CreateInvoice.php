<?php

namespace App\UseCase\Invoice;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Exceptions\EmptyInvoiceItemsException;
use App\Interface\InvoiceRepositoryInterface;

final class CreateInvoice
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function execute(InvoiceDTO $invoiceDto): Invoice
    {
        if (empty($invoiceDto->items) || !is_array($invoiceDto->items) || count($invoiceDto->items) === 0) {
            throw new EmptyInvoiceItemsException();
        }

        $invoice = new Invoice(
            $invoiceDto->id,
            $invoiceDto->code,
            $invoiceDto->status,
            $invoiceDto->provider_id,
            $invoiceDto->subtotal,
            $invoiceDto->tax,
            $invoiceDto->discount,
            $invoiceDto->total,
            $invoiceDto->items
        );


        return $this->invoiceRepository->save($invoice);   
    }
}