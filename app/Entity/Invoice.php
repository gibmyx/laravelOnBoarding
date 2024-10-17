<?php

declare(strict_types=1);

namespace App\Entity;

final class Invoice
{
    public function __construct(
        private string $id,
        private string $codigo,
        private string $estado,
        private string $proveedor_id,
        private float  $subtotal,
        private float  $impuesto,
        private float  $descuento,
        private float  $total,
    )
    {
    }

    public static function create(
        string $id,
        string $codigo,
        string $estado,
        string $proveedor_id,
        float  $subtotal,
        float  $impuesto,
        float  $descuento,
        float  $total
    ): self
    {
        $invoice = new self(
            $id,
            $codigo,
            $estado,
            $proveedor_id,
            $subtotal,
            $impuesto,
            $descuento,
            $total
        );

        $invoice->totalCeroValidate();

        return $invoice;
    }

    public static function toPrimitive(
        string $id,
        string $codigo,
        string $estado,
        string $proveedor_id,
        float  $subtotal,
        float  $impuesto,
        float  $descuento,
        float  $total)
    {
        return new self(
            $id,
            $codigo,
            $estado,
            $proveedor_id,
            $subtotal,
            $impuesto,
            $descuento,
            $total
        );
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

    private function totalCeroValidate(): void
    {
        if ($this->total == 0) {
            throw new \App\Exceptions\InvoiceTotalZeroException($this->codigo);
        }
    }

    public function update(
        string $codigo,
        string $estado,
        string $proveedorId,
        float $subtotal,
        float $impuesto,
        float $descuento,
        float $total
    ): void
    {
        $this->codigo = $codigo;
        $this->estado = $estado;
        $this->proveedor_id = $proveedorId;
        $this->subtotal = $subtotal;
        $this->impuesto = $impuesto;
        $this->descuento = $descuento;
        $this->total = $total;

        $this->totalCeroValidate();
    }

}