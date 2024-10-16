<?php

namespace App\DTO;

class ItemDTO
{
    public function __construct(
        private string $id,
        private string $factura_id,
        private string $item_id,
        private float $precio_unitario,
        private float $cantidad,
        private float $subtotal,
        private float $impuesto,
        private float $descuento,
        private float $total,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'factura_id' => $this->factura_id,
            'item_id' => $this->item_id,
            'precio_unitario' => $this->precio_unitario,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->subtotal,
            'impuesto' => $this->impuesto,
            'descuento' => $this->descuento,
            'total' => $this->total
        ];
    }

    public static function fromArray($data): self
    {
        return new self(
            $data['id'],
            $data['factura_id'],
            $data['item_id'],
            $data['precio_unitario'],
            $data['cantidad'],
            $data['subtotal'],
            $data['impuesto'],
            $data['descuento'],
            $data['total']
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFacturaId(): string
    {
        return $this->factura_id;
    }

    public function getItemId(): string
    {
        return $this->item_id;
    }

    public function getPrecioUnitario(): float
    {
        return $this->precio_unitario;
    }

    public function getCantidad(): float
    {
        return $this->cantidad;
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
