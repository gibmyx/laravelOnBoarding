<?php

namespace Tests\Unit;

use App\DTO\InvoiceDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\Models\Invoice;
use App\UseCase\Invoice\CreateInvoice;
use Mockery;
use Mockery\Mock;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class CreateInvoiceTest extends TestCase
{
    public function test_create_invoice_without_items(): void
    {
        $invoiceModel = new Invoice([
            'id' => Uuid::uuid4()->toString(),
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 20.5,
            'tax' => 0,
            'discount' => 0,
            'total' => 20.5,
        ]);

        dd($invoiceModel);
    }
}