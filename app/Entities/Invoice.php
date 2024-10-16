<?php

namespace App\Entities;

use App\DTO\InvoiceDTO;

class Invoice
{
    private string $id;
    private string $codigo;
    private string $estado;
    private string $proveedor_id;
    private float $subtotal;
    private float $impuesto;
    private float $descuento;
    private float $total;

    public function __construct(InvoiceDTO $invoiceDTO)
    {
        $this->id = $invoiceDTO->getId();
        $this->codigo = $invoiceDTO->getCodigo();
        $this->estado = $invoiceDTO->getEstado();
        $this->proveedor_id = $invoiceDTO->getProveedorId();
        $this->subtotal = $invoiceDTO->getSubtotal();
        $this->impuesto = $invoiceDTO->getImpuesto();
        $this->descuento = $invoiceDTO->getDescuento();
        $this->total = $invoiceDTO->getTotal();
    }

    public function update(InvoiceDTO $invoiceDTO): void
    {
        $this->codigo = $invoiceDTO->getCodigo();
        $this->estado = $invoiceDTO->getEstado();
        $this->proveedor_id = $invoiceDTO->getProveedorId();
        $this->subtotal = $invoiceDTO->getSubtotal();
        $this->impuesto = $invoiceDTO->getImpuesto();
        $this->descuento = $invoiceDTO->getDescuento();
        $this->total = $invoiceDTO->getTotal();
    }

    public function toDTO(): InvoiceDTO
    {
        return new InvoiceDTO(
            $this->id,
            $this->codigo,
            $this->estado,
            $this->proveedor_id,
            $this->subtotal,
            $this->impuesto,
            $this->descuento,
            $this->total
        );
    }

    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    public function getImpuesto(): float
    {
        return $this->impuesto;
    }

    public function getDescuento(): float
    {
        return $this->descuento;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
