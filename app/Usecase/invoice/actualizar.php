<?php

namespace App\Usecase\Invoice;

use App\DTO\invoiceDTO;
use App\Entity\Invoice\invoiceEntity;
use App\Repository\Invoice\invoiceInterface;
use App\Repository\Item\itemInterface;

class actualizar
{
    private $repositoryItem;
    private $repositoryInvoice;
    
    public function __construct(itemInterface $repositoryItem, invoiceInterface $repositoryInvoice)
    {
        $this->repositoryItem = $repositoryItem;
        $this->repositoryInvoice = $repositoryInvoice;
    }

    public function actualizar(invoiceDTO $invoice, array $items ,array $itemsNuevos, array $itemsEliminar)
    {
        // buscar factura y sus items correspondientes
        $factura = $this->repositoryInvoice->buscar($invoice->getId());

        $factura->setItems($items);
        
        if (!empty($itemsNuevos)) {
            //$factura->AñadirItems($itemsNuevos);
            foreach ($itemsNuevos as $item) {
                $this->repositoryItem->crear($item->getId());
            }
        }
        
        if (!empty($itemsEliminar)) {
            //$factura->EliminarItems($itemsEliminar);
            foreach ($itemsEliminar as $item) {
                $this->repositoryItem->eliminar($item->getId());
            }
        }
        /*
        $this->repositoryInvoice->actualizar($factura->getInvoice());
        $this->repositoryItem->actualizar($factura->getItems());
        */
    }
}