<?php

namespace App\DTO;

final class InvoiceItemDTO
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

    public static function fromArray(array $data): InvoiceItemDTO
    {
        return new self(
            $data['id'],
            $data['invoice_id'],
            $data['item_id'],
            $data['unit_price'],
            $data['quantity'],
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
            'invoice_id' => $this->invoice_id,
            'item_id' => $this->item_id,
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'discount' => $this->discount,
            'total' => $this->total,
        ];
    }
}
