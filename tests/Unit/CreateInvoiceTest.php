<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Command\InvoiceCommand;
use App\Command\InvoiceItemCommand;
use App\Entity\InvoiceItem;
use App\Interfaces\InvoiceItemRepository;
use App\Interfaces\InvoiceRepository;
use App\Entity\Invoice;
use Tests\TestCase;
use Mockery;

final class CreateInvoiceTest extends TestCase
{

    public function test_create_invoice_exception_items_no_found(): void
    {
        $this->expectException(\App\Exceptions\InvoiceItemsNoFoundException::class);

        $invoice = $this->InvoiceMother(subtotal: 100, impuesto: 7, descuento: 5, total: 105);

        $repository = Mockery::mock(InvoiceRepository::class);
        $repositoryItem = Mockery::mock(InvoiceItemRepository::class);

        $createHandler = new \App\Handler\InvoiceCreate($repository, $repositoryItem);

        $response = ($createHandler)(new InvoiceCommand(
            $invoice->id(),
            $invoice->codigo(),
            $invoice->estado(),
            $invoice->proveedorId(),
            $invoice->subtotal(),
            $invoice->impuesto(),
            $invoice->descuento(),
            $invoice->total(),
            ...$this->buildCommandItem([])
        ));

        $this->assertEquals('Invoice created successfully!', $response);
    }

    public function test_create_invoice_exception_total_0(): void
    {
        $this->expectException(\App\Exceptions\InvoiceTotalZeroException::class);

        $invoice = $this->InvoiceMother(subtotal: 0, impuesto: 0, descuento: 0, total: 0);
        $item = $this->invoiceItemMother(cantidad: 1, precioUnitario: 100, subtotal: 100, impuesto: 7, descuento: 5, total: 105);

        $repository = Mockery::mock(InvoiceRepository::class);
        $repositoryItem = Mockery::mock(InvoiceItemRepository::class);

        $createHandler = new \App\Handler\InvoiceCreate($repository, $repositoryItem);

        $response = ($createHandler)(new InvoiceCommand(
            $invoice->id(),
            $invoice->codigo(),
            $invoice->estado(),
            $invoice->proveedorId(),
            $invoice->subtotal(),
            $invoice->impuesto(),
            $invoice->descuento(),
            $invoice->total(),
            ...$this->buildCommandItem([$item])
        ));

        $this->assertEquals('Invoice created successfully!', $response);
    }

    public function test_create_invoice(): void
    {
        $invoice = $this->InvoiceMother(subtotal: 100, impuesto: 7, descuento: 5, total: 105);
        $item = $this->invoiceItemMother(cantidad: 1, precioUnitario: 100, subtotal: 100, impuesto: 7, descuento: 5, total: 105);

        $repository = Mockery::mock(InvoiceRepository::class);
        $repositoryItem = Mockery::mock(InvoiceItemRepository::class);

        $repository->shouldReceive('create')
            ->with($this->similarTo($invoice))
            ->andReturnNull()
            ->once();

        foreach ([$item] as $row) {
            $repositoryItem->shouldReceive('save')
                ->with($this->similarTo($row))
                ->andReturnNull()
                ->once();
        }

        $createHandler = new \App\Handler\InvoiceCreate($repository, $repositoryItem);

        $response = ($createHandler)(new InvoiceCommand(
            $invoice->id(),
            $invoice->codigo(),
            $invoice->estado(),
            $invoice->proveedorId(),
            $invoice->subtotal(),
            $invoice->impuesto(),
            $invoice->descuento(),
            $invoice->total(),
            ...$this->buildCommandItem([$item])
        ));

        $this->assertEquals('Invoice created successfully!', $response);
    }

    private function InvoiceMother(
        string $id = null,
        string $codigo = null,
        string $estado = null,
        string $proveedor_id = null,
        float  $subtotal = null,
        float  $impuesto = null,
        float  $descuento = null,
        float  $total = null,
    ): Invoice
    {
        return Invoice::toPrimitive(
            $id ?? fake()->uuid(),
            $codigo ?? fake()->text(),
            $estado ?? fake()->text(),
            $proveedor_id ?? fake()->uuid(),
            $subtotal ?? fake()->randomNumber(),
            $impuesto ?? fake()->randomNumber(),
            $descuento ?? fake()->randomNumber(),
            $total ?? fake()->randomNumber(),
        );
    }

    private function invoiceItemMother(
        string $id = null,
        string $facturaId = null,
        string $itemId = null,
        float  $precioUnitario = null,
        float  $cantidad = null,
        float  $subtotal = null,
        float  $impuesto = null,
        float  $descuento = null,
        float  $total = null,
    ): InvoiceItem
    {
        return InvoiceItem::toPrimitive(
            $id ?? fake()->uuid(),
            $facturaId ?? fake()->uuid(),
            $itemId ?? fake()->uuid(),
            $precioUnitario ?? fake()->randomNumber(),
            $cantidad ?? fake()->randomNumber(),
            $subtotal ?? fake()->randomNumber(),
            $impuesto ?? fake()->randomNumber(),
            $descuento ?? fake()->randomNumber(),
            $total ?? fake()->randomNumber(),
        );
    }

    private function similarTo($expected)
    {
        return Mockery::on(function ($actual) use ($expected) {
            return $actual == $expected;
        });
    }

    private function buildCommandItem(array $array): array
    {
        $items = [];

        foreach ($array as $item) {
            $items[] = new InvoiceItemCommand(
                $item->id(),
                $item->facturaId(),
                $item->itemId(),
                $item->precioUnitario(),
                $item->cantidad(),
                $item->subtotal(),
                $item->impuesto(),
                $item->descuento(),
                $item->total(),
            );
        }

        return $items;
    }
}