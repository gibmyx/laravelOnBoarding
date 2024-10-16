<?php

namespace App\UseCase\Invoice;

use App\Models\InvoiceModel;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Exceptions\EmptyInvoiceItemsException;
use App\Exceptions\InvalidInvoiceDiscountException;
use App\Exceptions\InvalidInvoiceItemSubtotalException;
use App\Exceptions\InvalidInvoiceItemTaxException;
use App\Exceptions\InvalidInvoiceTaxException;
use App\Exceptions\InvalidInvoiceTotalException;
use App\Exceptions\InvalidInvoiceTotalItemsException;
use App\Exceptions\InvoiceNotFound;
use App\Interface\InvoiceItemRepositoryInterface;
use App\Interface\InvoiceRepositoryInterface;

class EditInvoice
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository,
        private InvoiceItemRepositoryInterface $invoiceItemRepositoryInterface
    ) {}

    public function execute(string $id, InvoiceDTO $invoiceDto): void
    {
        $subtotalInvoiceItems = 0;
        $taxInvoiceItems = 0;
        $discountInvoiceItems = 0;
        $totalInvoiceItems = 0;

        $invoice = $this->invoiceRepository->search($id);

        if (is_null($invoice)) {
            throw new InvoiceNotFound($id);
        }

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

            $item = new InvoiceItem(
                $item['id'],
                $item['invoice_id'],
                $item['item_id'],
                $item['unit_price'],
                $item['amount'],
                $item['subtotal'],
                $item['tax'],
                $item['discount'],
                $item['total']
            );

            $this->invoiceItemRepositoryInterface->save($item);

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


        $this->invoiceRepository->update($invoice->id(), $invoice);
    }
}