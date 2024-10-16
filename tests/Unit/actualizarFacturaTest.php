<?php

use App\DTO\invoiceDTO;
use App\DTO\itemDTO;
use App\Entity\Invoice\invoiceEntity;
use App\Exceptions\Invoice\DescuentoException;
use App\Exceptions\Invoice\ImpuestoException;
use App\Exceptions\Invoice\NoItemsException;
use App\Exceptions\Invoice\SubtotalException;
use App\Exceptions\Invoice\TotalException;
use App\Exceptions\Invoice\TotalMountException;
use App\Repository\EstudianteRepository\EstudianteInterface;
use App\Repository\Invoice\invoiceInterface;
use App\Repository\Item\itemInterface;
use App\Usecase\Invoice\actualizar;
use App\Usecase\Invoice\crear;
use App\Usecase\Invoice\invoiceCrear;
use Tests\TestCase;

class actualizarFacturaTest extends TestCase{

    public function test_buscar_factura(){

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 7.0,
                'descuento' => 10.0,
                'total' => 97.0
            ]
            );

        $item1 = new itemDTO
        (
            [
            'id' => 1,
            'factura_id' => 12,
            'item_id' => 45,
            'precio_unitario' => 25,
            'cantidad' => 2,
            'subtotal' => 50,
            'impuesto' => 3.5,
            'descuento' => 5,
            'total' => 48.5
            ]
            );

        $item2 = new itemDTO
        (
            [
            'id' => 2,
            'factura_id' => 12,
            'item_id' => 46,
            'precio_unitario' => 50,
            'cantidad' => 1,
            'subtotal' => 50,
            'impuesto' => 3.5,
            'descuento' => 5,
            'total' => 48.5
            ]
            );

        $items = [
            $item1,
            $item2
        ];

        $item3 =  new itemDTO([
            'id' => 3,
            'factura_id' => 12,
            'item_id' => 47,
            'precio_unitario' => 20,
            'cantidad' => 1,
            'subtotal' => 20,
            'impuesto' => 1.4,
            'descuento' => 2,
            'total' => 19.4
        ]
        );

        $itemsEliminar = [$item3];
        $itemsNuevos = [$item3];

        $factura = new invoiceEntity($invoiceDTO);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('buscar') 
        ->with($invoiceDTO->getId()) 
        ->andReturn($factura);

        $mockItems = mockery::mock(itemInterface::class);


        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */


        $crearInvoice = new actualizar($mockItems, $mockInvoice);

        $crearInvoice->actualizar($invoiceDTO, $items, $itemsNuevos, $itemsEliminar);

        $this->assertTrue(true);
    }

    public function test_agregar_items_factura(){

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 7.0,
                'descuento' => 10.0,
                'total' => 97.0
            ]
            );

        $item1 = new itemDTO
        (
            [
            'id' => 1,
            'factura_id' => 12,
            'item_id' => 45,
            'precio_unitario' => 25,
            'cantidad' => 2,
            'subtotal' => 50,
            'impuesto' => 3.5,
            'descuento' => 5,
            'total' => 48.5
            ]
            );

        $item2 = new itemDTO
        (
            [
            'id' => 2,
            'factura_id' => 12,
            'item_id' => 46,
            'precio_unitario' => 50,
            'cantidad' => 1,
            'subtotal' => 50,
            'impuesto' => 3.5,
            'descuento' => 5,
            'total' => 48.5
            ]
            );

        $items = [
            $item1,
            $item2
        ];

        $itemsEliminar = [];
        $itemsAgregar = [
            [
                'id' => 3,
                'factura_id' => 12,
                'item_id' => 47,
                'precio_unitario' => 20,
                'cantidad' => 1,
                'subtotal' => 20,
                'impuesto' => 1.4,
                'descuento' => 2,
                'total' => 19.4
                ]
        ];

        $factura = new invoiceEntity($invoiceDTO);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('buscar') 
        ->with($invoiceDTO->getId()) 
        ->andReturn($factura);

        $mockItems = mockery::mock(itemInterface::class);


        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */


        $crearInvoice = new actualizar($mockItems, $mockInvoice);

        $crearInvoice->actualizar($invoiceDTO, $items, $itemsEliminar, $itemsAgregar);

        $this->assertTrue(true);
    }
}