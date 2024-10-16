<?php

namespace Tests\Unit\Invoice;

use App\Interface\ItemRepositoryInterface;
use Tests\TestCase;
use App\Entities\Invoice;
use App\DTO\InvoiceDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\UseCase\Invoice\UpdateInvoice;
use Mockery;
use App\DTO\ItemDTO;
use App\Exceptions\InvoiceNotFoundException;
use App\Exceptions\EmptyItemsException;
use App\Exceptions\InvalidTotalException;

class UpdateInvoiceTest extends TestCase
{
    public function test_update_invoice()
    {
        $invoiceData = [
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 40.0,
            'impuesto' => 2.8,
            'descuento' => 2.0,
            'total' => 40.8,
        ];

        $invoiceDTO = InvoiceDTO::fromArray($invoiceData);

        $invoiceEntity = new Invoice($invoiceDTO);

        $itemData = [
            'id' => '1',
            'factura_id' => '1',
            'item_id' => '1',
            'precio_unitario' => 10,
            'cantidad' => 2,
            'subtotal' => 20,
            'impuesto' => 1.4,
            'descuento' => 1,
            'total' => 20.4,
        ];

        $itemDTO = ItemDTO::fromArray($itemData);


        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);
        $mockInvoice->shouldReceive('search')
            ->with($invoiceDTO->getId())
            ->andReturn($invoiceEntity);

        $mockItem->shouldReceive('delete')
            ->with($itemDTO->getId())
            ->andReturn(null);

        $mockItem->shouldReceive('create')
            ->with($itemDTO->toArray())
            ->andReturn(null);

        $mockInvoice->shouldReceive('update')
            ->with($invoiceEntity)
            ->andReturn($invoiceEntity);

        $updateInvoice = new UpdateInvoice($mockInvoice, $mockItem);

        $updateInvoice->execute($invoiceDTO, [$itemDTO], [$itemDTO]);

        $this->assertTrue(true);
    }

    public function test_invoice_not_found_exception()
    {
        $this->expectException(InvoiceNotFoundException::class);

        $invoiceDTO = InvoiceDTO::fromArray([
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 40.0,
            'impuesto' => 2.8,
            'descuento' => 2.0,
            'total' => 40.8,
        ]);

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockInvoice->shouldReceive('search')
            ->with($invoiceDTO->getId())
            ->andReturn(null);

        $updateInvoice = new UpdateInvoice($mockInvoice, $mockItem);

        $updateInvoice->execute($invoiceDTO, [], []);
    }

    public function test_empty_items_exception()
    {
        $this->expectException(EmptyItemsException::class);

        $invoiceDTO = InvoiceDTO::fromArray([
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 40.0,
            'impuesto' => 2.8,
            'descuento' => 2.0,
            'total' => 40.8,
        ]);

        $invoiceEntity = new Invoice($invoiceDTO);

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockInvoice->shouldReceive('search')
            ->with($invoiceDTO->getId())
            ->andReturn($invoiceEntity);

        $updateInvoice = new UpdateInvoice($mockInvoice, $mockItem);

        $updateInvoice->execute($invoiceDTO, [], []);
    }

    public function test_invalid_total_exception()
    {
        $this->expectException(InvalidTotalException::class);

        $invoiceDTO = InvoiceDTO::fromArray([
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 40.0,
            'impuesto' => 2.8,
            'descuento' => 2.0,
            'total' => 40.8,
        ]);

        $itemDTO = ItemDTO::fromArray([
            'id' => '1',
            'factura_id' => '1',
            'item_id' => '1',
            'precio_unitario' => 0,
            'cantidad' => 0,
            'subtotal' => 0,
            'impuesto' => 0,
            'descuento' => 0,
            'total' => 0,
        ]);

        $invoiceEntity = new Invoice($invoiceDTO);

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockInvoice->shouldReceive('search')
            ->with($invoiceDTO->getId())
            ->andReturn($invoiceEntity);

        $updateInvoice = new UpdateInvoice($mockInvoice, $mockItem);

        $updateInvoice->execute($invoiceDTO, [$itemDTO], []);
    }
}
