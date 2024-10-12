<?php
namespace App\Entity;

final class InvoiceItem
{
    public function __construct(
        public string $id,
        public string $invoice_id,
        public string $item_id,
        public float $unit_price,
        public float $quantity,
        public float $subtotal,
        public float $tax,
        public float $discount,
        public float $total
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function invoiceId(): string
    {
        return $this->invoice_id;
    }

    public function itemId(): string
    {
        return $this->item_id;
    }

    public function unitPrice(): float
    {
        return $this->unit_price;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }

    public function subtotal(): float
    {
        return $this->subtotal;
    }

    public function tax(): float
    {
        return $this->tax;
    }

    public function discount(): float
    {
        return $this->discount;
    }

    public function total(): float
    {
        return $this->total;
    }

    public static function create(
        string $id,
        string $invoice_id,
        string $item_id,
        float $unit_price,
        float $quantity,
        float $subtotal,
        float $tax,
        float $discount,
        float $total
    ): self
    {
        return new self(
            $id,
            $invoice_id,
            $item_id,
            $unit_price,
            $quantity,
            $subtotal,
            $tax,
            $discount,
            $total
        );
    }
}
