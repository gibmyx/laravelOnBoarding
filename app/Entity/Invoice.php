<?php
namespace App\Entity;

final class Invoice
{
    public function __construct(
        public string $id,
        public string $code,
        public string $status,
        public string $provider_id,
        public float $subtotal,
        public float $tax,
        public float $discount,
        public float $total,
        public array $items
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function providerId(): string
    {
        return $this->provider_id;
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

    public function items(): array
    {
        return $this->items;
    }

    public static function create(
        string $id,
        string $code,
        string $status,
        string $provider_id,
        float $subtotal,
        float $tax,
        float $discount,
        float $total,
        array $items
    ): self
    {
        return new self(
            $id,
            $code,
            $status,
            $provider_id,
            $subtotal,
            $tax,
            $discount,
            $total,
            $items
        );
    }
}