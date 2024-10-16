<?php

namespace Tests\Unit;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice;
use App\Interface\InvoiceRepositoryInterface;
use App\UseCase\Invoice\EditInvoice;
use App\UseCase\Invoice\SearchInvoice;
use Mockery;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class EditInvoiceTest extends TestCase
{

    public function test_edit_invoice(): void
    {
        $id = Uuid::uuid4()->toString();

        $invoice = [
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 50.0,
            'tax' => 3.5,
            'discount' => 5.0,
            'total' => 53.5,
        ];

        $items = [
            [
                'id' => '1',
                'invoice_id' => $id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10,
                'amount' => 3,
                'subtotal' => 30.0,
                'tax' => 2.1,
                'discount' => 2.0,
                'total' => 32.1,
            ],
            [
                'id' => '2',
                'factura_id' => $id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 20,
                'amount' => 1,
                'subtotal' => 20.0, 
                'tax' => 1.4, 
                'discount' => 3.0,
                'total' => 21.4, 
            ],
        ];

        $invoiceDto = InvoiceDTO::fromArray(array_merge($invoice, ['items' => $items]));

        
        $entityInvoice = new Invoice(
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
         ->shouldReceive('search')
         ->with($id)
         ->once()
         ->andReturn($entityInvoice);

        $searchInvoice = new SearchInvoice($invoiceMock);

        
        $invoiceSearchResult = $searchInvoice->execute($id);


        $invoiceMock
         ->shouldReceive('update')
         ->with($invoiceSearchResult->id, $invoiceSearchResult)
         ->once()
         ->andReturnNull();

         $updateInvoice = new EditInvoice($invoiceMock);

         $updateInvoice->execute($id, $invoiceDto);

        
        $this->assertTrue(true);


    }

    private function similarTo($expected){        
        return Mockery::on(function ($actual) use ($expected){            
            return $actual == $expected;
        });    
    }
}