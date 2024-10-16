<?php

namespace App\UseCase\Invoice;

use App\Entities\Invoice;
use App\DTO\InvoiceDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\Exceptions\EmptyItemsException;
use App\Exceptions\InvalidTotalException;

class CreateInvoice
{
    private $repository;

    public function __construct(InvoiceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(InvoiceDTO $invoiceDTO, array $items): void
    {
        if (empty($items)) {
            throw new EmptyItemsException();
        }

        $invoice = new Invoice($invoiceDTO);
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

        $invoice->update(new InvoiceDTO(
            $invoiceDTO->getId(),
            $invoiceDTO->getCodigo(),
            $invoiceDTO->getEstado(),
            $invoiceDTO->getProveedorId(),
            $subtotal,
            $impuesto,
            $descuento,
            $total
        ));

        $this->repository->create($invoice->toDTO()->toArray());
    }
}
