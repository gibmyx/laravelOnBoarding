<?php

namespace App\UseCase\Invoice;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Exceptions\EmptyInvoiceItemsException;
use App\Exceptions\InvalidInvoiceDiscountException;
use App\Exceptions\InvalidInvoiceItemSubtotalException;
use App\Exceptions\InvalidInvoiceItemTaxException;
use App\Exceptions\InvalidInvoiceTaxException;
use App\Exceptions\InvalidInvoiceTotalException;
use App\Exceptions\InvalidInvoiceTotalItemsException;
use App\Interface\InvoiceRepositoryInterface;

final class CreateInvoice
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function execute(InvoiceDTO $invoiceDto): void
    {
        $subtotalInvoiceItems = 0;
        $taxInvoiceItems = 0;
        $discountInvoiceItems = 0;
        $totalInvoiceItems = 0;

        if (empty($invoiceDto->items) || !is_array($invoiceDto->items) || count($invoiceDto->items) === 0) {
            throw new EmptyInvoiceItemsException();
        }

        if ($invoiceDto->total == 0) {
            throw new InvalidInvoiceTotalException();
        }

        foreach ($invoiceDto->items as $item) {
            if ($item['tax'] != 0) {
                if($item['tax'] != ($item['subtotal'] * 7) / 100) {
                    throw new InvalidInvoiceItemTaxException($item['id']);
                }
            }
            $subtotalInvoiceItems += $item['subtotal'];
            $taxInvoiceItems += $item['tax'];
            $discountInvoiceItems += $item['discount'];
            $totalInvoiceItems += $item['total'];
        }

        if ($subtotalInvoiceItems != $invoiceDto->subtotal) {
            throw new InvalidInvoiceItemSubtotalException($invoiceDto->id);
        }

        if ($taxInvoiceItems != $invoiceDto->tax) {
            throw new InvalidInvoiceTaxException($invoiceDto->id);
        }

        if ($discountInvoiceItems != $invoiceDto->discount) {
            throw new InvalidInvoiceDiscountException($invoiceDto->id);
        }

        if ($totalInvoiceItems != $invoiceDto->total) {
            throw new InvalidInvoiceTotalItemsException($invoiceDto->id);
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


        $this->invoiceRepository->save($invoice);   
    }
}