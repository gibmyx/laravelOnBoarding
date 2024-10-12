<?php

namespace App\DTO;

final class InvoiceDTO
{
    public function __construct(
        public string $id,
        public string $code,
        public string $status,
        public string $provider_id,
        public float $subtotal,
        public float $tax,
        public float $discount,
        public float $total
    ) {}

    public static function fromArray(array $data): InvoiceDTO
    {
        return new self(
            $data['id'],
            $data['code'],
            $data['status'],
            $data['provider_id'],
            $data['subtotal'],
            $data['tax'],
            $data['discount'],
            $data['total']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'status' => $this->status,
            'provider_id' => $this->provider_id,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'discount' => $this->discount,
            'total' => $this->total,
        ];
    }
}

