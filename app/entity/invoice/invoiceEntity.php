<?php

namespace App\Entity\Invoice;

use App\DTO\invoiceDTO;
use App\Exceptions\Invoice\DescuentoException;
use App\Exceptions\Invoice\ImpuestoException;
use App\Exceptions\Invoice\NoItemsException;
use App\Exceptions\Invoice\SubtotalException;
use App\Exceptions\Invoice\TotalException;
use App\Exceptions\Invoice\TotalMountException;
use App\Models\invoice;

class invoiceEntity
{
    private $invoice;
    private $items;

    public function __construct(invoiceDTO $invoice = null, array $items = null)
    {
        $this->invoice = $invoice;
        $this->items = $items;

        if (!is_null($items) && is_null($invoice)) {
        $this->noItemsException();
        $this->TotalMountException();
        $this->SubtotalException();
        $this->ImpuestoException();
        $this->DescuentoException();
        $this->TotalException();
        }
    }

    public function setItems(array $items)
    {
        $this->items = $items;
    }

    public function AñadirItems(array $itemsNuevos)
    {
        $items = $this->items;
        
        foreach ($itemsNuevos as $item) {
            $items [] = $item;
        }
        $this->items = $items;
    }

    public function EliminarItems(array $itemsEliminar)
    {
        $items = $this->items;
        $i = 0;

        foreach ($itemsEliminar as $item) {
            
            if ($item->getId() == $items[$i]->getId() ) {
                unset($items[$i]);
            }
        }

        $this->items = $items;
    }

    public function setFromModel(invoice $invoice){
        return ;
    }

    public function getItems():array
    {
        $items = [];
        foreach ($this->items as $item) {
            $items [] = $item->getData();
        }
        return $items;
    }

    public function getInvoice():array
    {
        return $this->invoice->getData();
    }

    public function noItemsException(){
        if (empty($this->items)){
            throw new NoItemsException();
        }
    }

    public function TotalMountException()
    {
        if ($this->invoice->getTotal() == 0) {
            throw new TotalMountException();
        }
    }

    public function SubtotalException(){
        $subtotalItems = 0;

        foreach ($this->items as $item) {
            $subtotalItems += $item->getSubtotal();
        }

        if ($subtotalItems != $this->invoice->getSubtotal()){
            throw new SubtotalException();
        }
    }

    public function ImpuestoException(){
        $impuestoItems = 0;

        foreach ($this->items as $item) {
            $impuestoItems += $item->getImpuesto();
        }

        if ($impuestoItems != $this->invoice->getImpuesto()){
            throw new ImpuestoException();
        }
    }

    public function DescuentoException(){
        $descuentoItems = 0;

        foreach ($this->items as $item) {
            $descuentoItems += $item->getDescuento();
        }

        if ($descuentoItems != $this->invoice->getDescuento()){
            throw new DescuentoException();
        }
    }

    public function TotalException(){
        $totalItems = 0;

        foreach ($this->items as $item) {
            $totalItems += $item->getTotal();
        }

        if ($totalItems != $this->invoice->getTotal()){
            throw new TotalException();
        }
    }

    
}