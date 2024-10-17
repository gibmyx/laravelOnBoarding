<?php

namespace App\DTO;

class InvoiceDTO
{
    public function __construct(
        private string $id,
        private string $codigo,
        private string $estado,
        private string $proveedor_id,
        private float $subtotal,
        private float $impuesto,
        private float $descuento,
        private float $total,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'estado' => $this->estado,
            'proveedor_id' => $this->proveedor_id,
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
            $data['codigo'],
            $data['estado'],
            $data['proveedor_id'],
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

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getProveedorId(): string
    {
        return $this->proveedor_id;
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
