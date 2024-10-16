<?php

namespace App\Repository\Invoice;

use App\DTO\invoiceDTO;
use App\Entity\Invoice\invoiceEntity;
use App\Models\invoice;


class InvoiceRepository implements invoiceInterface{

    public function crear(array $invoice):void
    {
        invoice::create($invoice);
    }

    public function Buscar(string $uuid):?invoiceEntity
    {
        $invoice = invoice::where('id', $uuid)->first();
        return new invoiceEntity(new invoiceDTO(
            [
                'id' => $invoice['id'],
                'codigo' => $invoice['codigo'],
                'estado' => $invoice['estado'],
                'proveedor_id' => $invoice['proveedor_id'],
                'subtotal' => $invoice['subtotal'],
                'impuesto' => $invoice['impuesto'],
                'descuento' => $invoice['descuento'],
                'total' => $invoice['total'],
            ]
        ));
    }

    public function Modificar(invoice $estudianteActual, invoiceEntity $DTOestudiante): void
    {
        $estudianteActual->fromDTO($DTOestudiante);
        $estudianteActual->save(); 
    }
}
?>