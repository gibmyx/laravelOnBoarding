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
use App\Usecase\Invoice\crear;
use App\Usecase\Invoice\invoiceCrear;
use Tests\TestCase;

class crearFacturaTest extends TestCase{

    public function test_crear_factura(){

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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */


        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

        $this->assertTrue(true);
    }

    public function test_crear_factura_monto_total_exception(){

        $this->expectExceptionMessage("Una factura no puede tener monto 0");
        $this->expectException(TotalMountException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 7.0,
                'descuento' => 10.0,
                'total' => 0
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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }

    public function test_crear_factura_subtotal_exception(){

        $this->expectExceptionMessage("El subtotal de la factura no es igual al subtotal de todos los items sumados");
        $this->expectException(SubtotalException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 10.0,
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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }

    public function test_crear_factura_impuesto_exception(){

        $this->expectExceptionMessage("El impuesto de la factura no es igual al impuesto de todos los items sumados");
        $this->expectException(ImpuestoException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 3.0,
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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }

    public function test_crear_factura_descuento_exception(){

        $this->expectExceptionMessage("El descuento de la factura no es igual al descuento de todos los items sumados");
        $this->expectException(DescuentoException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 7.0,
                'descuento' => 15.0,
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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }

    public function test_crear_factura_total_exception(){

        $this->expectExceptionMessage("El total de la factura no es igual al total de todos los items sumados");
        $this->expectException(TotalException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 100.0,
                'impuesto'=> 7.0,
                'descuento' => 10.0,
                'total' => 100.0
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

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }
    
    public function test_crear_factura_no_items_exception(){

        $this->expectExceptionMessage("No hay items en la factura");
        $this->expectException(NoItemsException::class);

        $invoiceDTO = new invoiceDTO(
            [
                'id' => 12,
                'codigo' => 'INV-01',
                'estado' => 'pending',
                'proveedor_id' => 12,
                'subtotal' => 97.0,
                'impuesto'=> 7.0,
                'descuento' => 10.0,
                'total' => 100.0
            ]
            );

        $items = [];

        $factura = new invoiceEntity($invoiceDTO, $items);

        $mockInvoice = mockery::mock(invoiceInterface::class);

        $mockInvoice->shouldReceive('crear') ->with($factura->getInvoice()) ->andReturn(null);

        $mockItems = mockery::mock(itemInterface::class);

        $mockItems->shouldReceive('crear') ->with($factura->getItems()) ->andReturn(null);

        /** @var invoiceInterface $mockInvoice */
        /** @var itemInterface $mockItems */

        $crearInvoice = new crear($mockItems, $mockInvoice);

        $crearInvoice->crear($invoiceDTO, $items);

    }


    /*public function test_excepcion_buscar()
    {
        $cedula = 4234;

        $mock = mockery::mock(EstudianteInterface::class);

        $mock->shouldReceive('BuscarEstudiante')
        ->with($cedula)
        ->andReturnNull();

        $this->expectException(ExcepcionBuscar::class);
        $this->expectExceptionMessage('No se ha encontrado el estudiante');

        /** @var EstudianteInterface $mock */

       // $buscar = new BuscarEstudiante($mock);

      //  $buscar->BuscarEstudiante($cedula);
    //}
}