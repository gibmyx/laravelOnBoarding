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
        
        $existingItems = $this->itemRepository->findByInvoiceId($command->id());
        $existingItemsCollection = collect($existingItems);
        $commandItemsCollection = collect($command->items());
        
        $differences = $existingItemsCollection->diffUsing($commandItemsCollection, function ($existingItem, $commandItem) {
            return $existingItem->id() === $commandItem->id() ? 0 : -1;
        });
        

        $newSubtotal = 0;
        $newTax = 0;
        $newDiscount = 0;
        $newTotal = 0;

        foreach ($differences as $difference) {
            $newSubtotal += $difference->subtotal();
            $newTax += $difference->impuesto();
            $newDiscount += $difference->descuento();
            $newTotal += $difference->total();
        }

        foreach ($differences as $difference) {
            $this->itemRepository->delete($difference->id());
        }


        foreach ($command->items() as $item) {
            $invoiceItem = $this->buildItem($item);
            $this->itemRepository->save($invoiceItem);
        }

        $invoice->update(
            $command->codigo(),
            $command->estado(),
            $command->proveedorId(),
            $invoice->subtotal() - $newSubtotal,
            $invoice->impuesto() - $newTax,
            $invoice->descuento() - $newDiscount,
            $invoice->total() - $newTotal,
        );

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