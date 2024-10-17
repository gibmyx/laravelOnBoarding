<?php

namespace App\UseCase\Invoice;

use App\Entities\Invoice;
use App\DTO\InvoiceDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\Interface\ItemRepositoryInterface;
use App\Exceptions\EmptyItemsException;
use App\Exceptions\InvalidTotalException;

class CreateInvoice
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

    public function execute(InvoiceDTO $invoiceDTO, array $items): void
    {
        if (empty($items)) {
            throw new EmptyItemsException();
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

        $invoice = new Invoice(new InvoiceDTO(
            $invoiceDTO->getId(),
            $invoiceDTO->getCodigo(),
            $invoiceDTO->getEstado(),
            $invoiceDTO->getProveedorId(),
            $subtotal,
            $impuesto,
            $descuento,
            $total
        ));

        $this->invoiceRepository->create($invoice->toDTO()->toArray());
    }
}
