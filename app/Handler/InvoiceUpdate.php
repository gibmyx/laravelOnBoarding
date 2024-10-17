<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\InvoiceCommand;
use App\Entity\InvoiceItem;
use App\Interfaces\InvoiceItemRepository;
use App\Interfaces\InvoiceRepository;

final class InvoiceUpdate
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

        $invoice = $this->repository->find($command->id());

        if ($invoice === null) {
            throw new \App\Exceptions\InvoiceNotFoundException($command->id());
        }


        $invoice->update(
            $command->codigo(),
            $command->estado(),
            $command->proveedorId(),
            $command->subtotal(),
            $command->impuesto(),
            $command->descuento(),
            $command->total(),
        );

        
        $existingItems = $this->itemRepository->findByInvoiceId($command->id());

        $differences = [];

        foreach ($existingItems as $existingItem) {
            $found = false;
            foreach ($command->items() as $item) {
                if ($existingItem->id() === $item->id()) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $differences[] = $existingItem; 
            }
        }

        foreach ($differences as $difference) {
            $this->itemRepository->delete($difference->id());
        }


        foreach ($command->items() as $item) {
            $invoiceItem = $this->buildItem($item);
            $this->itemRepository->save($invoiceItem);
        }

        $this->repository->update($invoice);

        return 'Invoice updated successfully!';
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