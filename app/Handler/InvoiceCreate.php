<?php

declare(strict_types=1);


namespace App\Handler;


use App\Command\InvoiceCommand;
use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Interfaces\InvoiceItemRepository;
use App\Interfaces\InvoiceRepository;

final class InvoiceCreate
{
    public function __construct(
        private InvoiceRepository     $repository,
        private InvoiceItemRepository $itemRepository,
    )
    {
    }

    public function __invoke(InvoiceCommand $command): string
    {

        if (empty($command->items())) {
            throw new \App\Exceptions\InvoiceItemsNoFoundException($command->codigo());
        }

        $invoice = Invoice::create(
            $command->id(),
            $command->codigo(),
            $command->estado(),
            $command->proveedorId(),
            $command->subtotal(),
            $command->impuesto(),
            $command->descuento(),
            $command->total(),
        );

        $this->repository->create($invoice);

        foreach ($command->items() as $item) {
            $invoiceItem = $this->buildItem($item);

            $this->itemRepository->save($invoiceItem);
        }

        return 'Invoice created successfully!';
    }

    private function buildItem(\App\Command\InvoiceItemCommand $item): InvoiceItem
    {
        return InvoiceItem::create(
            $item->id(),
            $item->facturaId(),
            $item->itemId(),
            $item->precioUnitario(),
            $item->cantidad(),
            $item->subtotal(),
            $item->impuesto(),
            $item->descuento(),
            $item->total(),
        );
    }
}