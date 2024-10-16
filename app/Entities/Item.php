<?php

namespace App\Entities;

use App\DTO\ItemDTO;

class Item
{
    private string $id;
    private string $factura_id;
    private string $item_id;
    private float $precio_unitario;
    private float $cantidad;
    private float $subtotal;
    private float $impuesto;
    private float $descuento;
    private float $total;

    public function __construct(ItemDTO $itemDTO)
    {
        $this->id = $itemDTO->getId();
        $this->factura_id = $itemDTO->getFacturaId();
        $this->item_id = $itemDTO->getItemId();
        $this->precio_unitario = $itemDTO->getPrecioUnitario();
        $this->cantidad = $itemDTO->getCantidad();
        $this->subtotal = $itemDTO->getSubtotal();
        $this->impuesto = $itemDTO->getImpuesto();
        $this->descuento = $itemDTO->getDescuento();
        $this->total = $itemDTO->total;
    }

    public function toDTO(): ItemDTO
    {
        return new ItemDTO(
            $this->id,
            $this->factura_id,
            $this->item_id,
            $this->precio_unitario,
            $this->cantidad,
            $this->subtotal,
            $this->impuesto,
            $this->descuento,
            $this->total
        );
    }
}
