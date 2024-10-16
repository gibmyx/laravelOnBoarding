<?php

namespace Tests\Unit\Invoice;

use App\Entities\Invoice;
use App\Exceptions\EmptyItemsException;
use App\Exceptions\InvalidTotalException;
use App\DTO\InvoiceDTO;
use App\DTO\ItemDTO;
use App\Interface\InvoiceRepositoryInterface;
use App\Interface\ItemRepositoryInterface;
use App\UseCase\Invoice\CreateInvoice;
use Mockery;
use Tests\TestCase;

class CreateInvoiceTest extends TestCase
{
    public function test_crear_invoice()
    {
        $invoiceData = [
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 0,
            'impuesto' => 0,
            'descuento' => 0,
            'total' => 0,
        ];

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

        $invoiceDTO = InvoiceDTO::fromArray($invoiceData);
        $itemDTO1 = ItemDTO::fromArray($itemData);
        $itemDTO2 = ItemDTO::fromArray($itemData);

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockItem->shouldReceive('create')
            ->with([
                'id' => '1',
                'factura_id' => '1',
                'item_id' => '1',
                'precio_unitario' => 10,
                'cantidad' => 2,
                'subtotal' => 20,
                'impuesto' => 1.4,
                'descuento' => 1,
                'total' => 20.4,
            ])
            ->andReturn(null);

        $mockInvoice->shouldReceive('create')
            ->with([
                'id' => '1',
                'codigo' => 'wqe12ew',
                'estado' => 'registrado',
                'proveedor_id' => '1',
                'subtotal' => 40,
                'impuesto' => 2.8,
                'descuento' => 2,
                'total' => 40.8,
            ])
            ->andReturn(null);

        $crearInvoice = new CreateInvoice($mockInvoice, $mockItem);
        $crearInvoice->execute($invoiceDTO, [$itemDTO1, $itemDTO2]);

        $this->assertTrue(true);
    }

    public function test_empty_Items_exception()
    {
        $this->expectException(EmptyItemsException::class);

        $invoiceDTO = InvoiceDTO::fromArray([
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 0,
            'impuesto' => 0,
            'descuento' => 0,
            'total' => 0,
        ]);

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockInvoice->shouldReceive('create')
            ->with($invoiceDTO->toArray())
            ->andReturnNull();

        $crearInvoice = new CreateInvoice($mockInvoice, $mockItem);

        $crearInvoice->execute($invoiceDTO, []);
    }

    public function test_invalid_total_exception()
    {
        $this->expectException(InvalidTotalException::class);

        $invoiceDTO = InvoiceDTO::fromArray([
            'id' => '1',
            'codigo' => 'wqe12ew',
            'estado' => 'registrado',
            'proveedor_id' => '1',
            'subtotal' => 0,
            'impuesto' => 0,
            'descuento' => 0,
            'total' => 0,
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

        $mockInvoice = Mockery::mock(InvoiceRepositoryInterface::class);
        $mockItem = Mockery::mock(ItemRepositoryInterface::class);

        $mockInvoice->shouldReceive('create')
            ->with($invoiceDTO->toArray())
            ->andReturnNull();

        $crearInvoice = new CreateInvoice($mockInvoice, $mockItem);
        $crearInvoice->execute($invoiceDTO, [$itemDTO]);
    }
}
