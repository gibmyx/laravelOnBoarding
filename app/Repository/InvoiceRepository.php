<?php

namespace App\Repository;

use App\Interface\InvoiceRepositoryInterface;
use App\Models\InvoiceModel;
use App\Entities\Invoice;
use App\DTO\InvoiceDTO;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function create(array $data): void
    {
        InvoiceModel::create($data);
    }

    public function search(string $id): ?Invoice
    {
        $invoiceModel = InvoiceModel::find($id);
        return $this->mapToEntity($invoiceModel);
    }

    public function update(Invoice $invoice): Invoice
    {
        $invoiceModel = InvoiceModel::where('id', $invoice->toDTO()->getId())
            ->update($invoice->toDTO()->toArray());
        return $this->mapToEntity($invoiceModel);
    }

    public function delete(string $id): void
    {
        InvoiceModel::destroy($id);
    }

    private function mapToEntity(InvoiceModel $model): Invoice
    {
        return new Invoice(new InvoiceDTO(
            $model->id,
            $model->codigo,
            $model->estado,
            $model->proveedor_id,
            $model->subtotal,
            $model->impuesto,
            $model->descuento,
            $model->total
        ));
    }
}
