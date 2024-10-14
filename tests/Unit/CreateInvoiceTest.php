<?php

namespace Tests\Unit;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice as EntityInvoice;
use App\Exceptions\EmptyInvoiceItemsException;
use App\Interface\InvoiceRepositoryInterface;
use App\Models\Invoice;
use App\UseCase\Invoice\CreateInvoice;
use Mockery;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class CreateInvoiceTest extends TestCase
{
    public function test_create_invoice_without_items(): void
    {
        $this->expectException(EmptyInvoiceItemsException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 20.5,
            'tax' => 0,
            'discount' => 0,
            'total' => 20.5,
        ]);

        $items = [];

    
        $invoiceDto = InvoiceDTO::fromArray(array_merge($invoiceModel->toArray(), ['items' => $items]));

        
        $invoice = new EntityInvoice(
            $invoiceDto->id,
            $invoiceDto->code,
            $invoiceDto->status,
            $invoiceDto->provider_id,
            $invoiceDto->subtotal,
            $invoiceDto->tax,
            $invoiceDto->discount,
            $invoiceDto->total,
            $invoiceDto->items
        );
        
        /** @var MockeryInterface $invoiceMock*/

         $invoiceMock = Mockery::mock(InvoiceRepositoryInterface::class);


         $invoiceMock
         ->shouldReceive('save')
         ->with($this->similarTo($invoice))
         ->once()
         ->andReturn($invoice);

        
        $createInvoice = new CreateInvoice($invoiceMock);


        $createInvoice->execute($invoiceDto);

        $this->assertTrue(true);
    }

    private function similarTo($expected){        
        return Mockery::on(function ($actual) use ($expected){            
            return $actual == $expected;
        });    
    }
    
}