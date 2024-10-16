<?php

namespace App\UseCase\Invoice;

use App\Entities\Invoice;
use App\DTO\InvoiceDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\Interface\ItemRepositoryInterface;
use App\Exceptions\EmptyItemsException;
use App\Exceptions\InvalidTotalException;
use App\Exceptions\InvoiceNotFoundException;

class UpdateInvoice
{
    private $invoiceRepository;
    private $itemRepository;

    public function __construct(
        InvoiceRepositoryInterface $invoiceRepository,
        ItemRepositoryInterface $itemRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->itemRepository = $itemRepository;
    }

    public function execute(InvoiceDTO $invoiceDTO, array $items, array $itemsToRemove): Invoice
    {
        $invoice = $this->invoiceRepository->search($invoiceDTO->getId());

        if (is_null($invoice)) {
            throw new InvoiceNotFoundException($invoiceDTO->getId());
        }

        if (empty($items)) {
            throw new EmptyItemsException();
        }

        if (!empty($itemsToRemove)) {
            foreach ($itemsToRemove as $itemId) {
                $this->itemRepository->delete($itemId->getId());
            }
        }

        $subtotal = 0;
        $descuento = 0;
        $impuesto = 0;

        foreach ($items as $item) {
            $subtotal += $item->getSubtotal();
            $descuento += $item->getDescuento();
            if ($item->getImpuesto() > 0) {
                $impuesto += round($item->getSubtotal() * 0.07, 1);
                }
            }

        $total = $subtotal + $impuesto - $descuento;

        if ($total <= 0) {
            throw new InvalidTotalException();
        }

        foreach ($items as $item) {
            $this->itemRepository->create($item->toArray());
        }

        $invoice->update(new InvoiceDTO(
            $invoiceDTO->getId(),
            $invoiceDTO->getCodigo(),
            $invoiceDTO->getEstado(),
            $invoiceDTO->getProveedorId(),
            $invoice->getSubtotal() + $subtotal,
            $invoice->getImpuesto() + $impuesto,
            $invoice->getDescuento() + $descuento,
            $invoice->getTotal() + $total
        ));

        return $this->invoiceRepository->update($invoice);
    }
}
