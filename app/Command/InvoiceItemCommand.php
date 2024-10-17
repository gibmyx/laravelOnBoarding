<?php

declare(strict_types=1);

namespace App\Command;

final class InvoiceItemCommand
{
    public function __construct(
        private string $id,
        private string $factura_id,
        private string $item_id,
        private float  $precio_unitario,
        private float  $cantidad,
        private float  $subtotal,
        private float  $impuesto,
        private float  $descuento,
        private float  $total,
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function facturaId(): string
    {
        return $this->factura_id;
    }

    public function itemId(): string
    {
        return $this->item_id;
    }

    public function precioUnitario(): float
    {
        return $this->precio_unitario;
    }

    public function cantidad(): float
    {
        return $this->cantidad;
    }

    public function subtotal(): float
    {
        return $this->subtotal;
    }

    public function impuesto(): float
    {
        return $this->impuesto;
    }

    public function descuento(): float
    {
        return $this->descuento;
    }

    public function total(): float
    {
        return $this->total;
    }
}