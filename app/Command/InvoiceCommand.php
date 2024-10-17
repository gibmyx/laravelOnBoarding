<?php

declare(strict_types=1);

namespace App\Command;

final class InvoiceCommand
{
    private array $items;

    public function __construct(
        private string           $id,
        private string           $codigo,
        private string           $estado,
        private string           $proveedor_id,
        private float            $subtotal,
        private float            $impuesto,
        private float            $descuento,
        private float            $total,
        InvoiceItemCommand ...$items
    )
    {
        $this->items = $items;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function codigo(): string
    {
        return $this->codigo;
    }

    public function estado(): string
    {
        return $this->estado;
    }

    public function proveedorId(): string
    {
        return $this->proveedor_id;
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

    public function items(): array
    {
        return $this->items;
    }

}