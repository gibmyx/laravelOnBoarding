<?php

namespace App\UseCase\Item;

use App\Entity\InvoiceItem;
use App\Exceptions\InvoiceItemNotFound;
use App\Interface\InvoiceItemRepositoryInterface;

class SearchItemInvoice
{
    public function __construct(private InvoiceItemRepositoryInterface $invoiceItemRepository)
    {
    }

    public function execute(string $id): ?InvoiceItem
    {
        $search = $this->invoiceItemRepository->search($id);

        if (is_null($search)) {
            throw new InvoiceItemNotFound($id);
        }

        return $search;
    }
}