<?php

namespace App\Usecase\Invoice;

use App\DTO\invoiceDTO;
use App\Entity\Invoice\invoiceEntity;
use App\Repository\Invoice\invoiceInterface;
use App\Repository\Item\itemInterface;

class crear
{
    private $repositoryItem;
    private $repositoryInvoice;
    
    public function __construct(itemInterface $repositoryItem, invoiceInterface $repositoryInvoice)
    {
        $this->repositoryItem = $repositoryItem;
        $this->repositoryInvoice = $repositoryInvoice;
    }

    public function crear(invoiceDTO $invoice, array $items)
    {
        $factura = new invoiceEntity($invoice);
        $factura->setItems($items);
        $this->repositoryInvoice->crear($factura->getInvoice());
        $this->repositoryItem->crear($factura->getItems());
    }
}