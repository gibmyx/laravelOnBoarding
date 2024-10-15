<?php

namespace Tests\Unit;

use App\DTO\InvoiceDTO;
use App\Entity\Invoice as EntityInvoice;
use App\Exceptions\EmptyInvoiceItemsException;
use App\Exceptions\InvalidInvoiceDiscountException;
use App\Exceptions\InvalidInvoiceItemSubtotalException;
use App\Exceptions\InvalidInvoiceItemTaxException;
use App\Exceptions\InvalidInvoiceTaxException;
use App\Exceptions\InvalidInvoiceTotalException;
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
        

        $items = [];

    
        $invoiceDto = InvoiceDTO::fromArray(array_merge([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 20.5,
            'tax' => 0,
            'discount' => 0,
            'total' => 20.5,
        ], ['items' => $items]));

        
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
         ->andReturn();

        
        $createInvoice = new CreateInvoice($invoiceMock);


        $createInvoice->execute($invoiceDto);
    }

    public function test_create_invoice_with_total_zero(): void
    {
        $this->expectException(InvalidInvoiceTotalException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 20.5,
            'tax' => 0,
            'discount' => 0,
            'total' => 0,
        ]);

        $items = [
            [
                'id' => '1',
                'invoice_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10.5,
                'amount' => 1.0,
                'subtotal' => 10.5,
                'tax_item' => 0.0,
                'discount' => 0.0,
                'total' => 10.5,
            ],
            [
                'id' => '2',
                'invoice_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10.0,
                'amount' => 1.0,
                'subtotal' => 10.0,
                'tax' => 0.0,
                'discount' => 0.0,
                'total' => 10.0,
            ],
        ];

    
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
    }

    public function test_create_invoice_with_invalid_item_tax(): void
    {
        $this->expectException(InvalidInvoiceItemTaxException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 50.0,
            'tax' => 3.5,
            'discount' => 0,
            'total' => 53.5,
        ]);

        $items = [
            [
                'id' => '1',
                'invoice_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10,
                'amount' => 3,
                'subtotal' => 30.0,
                'tax' => 2.2,
                'discount' => 0.0,
                'total' => 32.1,
            ],
            [
                'id' => '2',
                'factura_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 20,
                'amount' => 1,
                'subtotal' => 20.0, // precio_unitario * cantidad
                'tax' => 1.4, // 7% de 20.0
                'discount' => 0,
                'total' => 21.4, // subtotal + impuesto - descuento
            ],
        ];

    
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
    }
    public function test_create_invoice_with_invalid_subtotal(): void
    {
        $this->expectException(InvalidInvoiceItemSubtotalException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 40.0,
            'tax' => 3.5,
            'discount' => 0,
            'total' => 53.5,
        ]);

        $items = [
            [
                'id' => '1',
                'invoice_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10,
                'amount' => 3,
                'subtotal' => 30.0,
                'tax' => 2.1,
                'discount' => 0.0,
                'total' => 32.1,
            ],
            [
                'id' => '2',
                'factura_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 20,
                'amount' => 1,
                'subtotal' => 20.0, // precio_unitario * cantidad
                'tax' => 1.4, // 7% de 20.0
                'discount' => 0,
                'total' => 21.4, // subtotal + impuesto - descuento
            ],
        ];

    
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
    }

    public function test_create_invoice_with_invalid_tax(): void
    {
        $this->expectException(InvalidInvoiceTaxException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 50.0,
            'tax' => 3.0,
            'discount' => 0,
            'total' => 53.5,
        ]);

        $items = [
            [
                'id' => '1',
                'invoice_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 10,
                'amount' => 3,
                'subtotal' => 30.0,
                'tax' => 2.1,
                'discount' => 0.0,
                'total' => 32.1,
            ],
            [
                'id' => '2',
                'factura_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 20,
                'amount' => 1,
                'subtotal' => 20.0, // precio_unitario * cantidad
                'tax' => 1.4, // 7% de 20.0
                'discount' => 0,
                'total' => 21.4, // subtotal + impuesto - descuento
            ],
        ];

    
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
    }
    public function test_create_invoice_with_invalid_discount(): void
    {
        $this->expectException(InvalidInvoiceDiscountException::class);
        $id = Uuid::uuid4()->toString();
        
        $invoiceModel = new Invoice([
            'id' => $id,
            'code' => 'INV-1',
            'status' => 'pending',
            'provider_id' => '1',
            'subtotal' => 50.0,
            'tax' => 3.5,
            'discount' => 3.0,
            'total' => 53.5,
        ]);

        $items = [
            [
                'id' => '1',
                'invoice_id' => $invoiceModel->id,
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
                'factura_id' => $invoiceModel->id,
                'item_id' => Uuid::uuid4()->toString(),
                'unit_price' => 20,
                'amount' => 1,
                'subtotal' => 20.0, // precio_unitario * cantidad
                'tax' => 1.4, // 7% de 20.0
                'discount' => 3.0,
                'total' => 21.4, // subtotal + impuesto - descuento
            ],
        ];

    
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
    }

    private function similarTo($expected){        
        return Mockery::on(function ($actual) use ($expected){            
            return $actual == $expected;
        });    
    }
    
}