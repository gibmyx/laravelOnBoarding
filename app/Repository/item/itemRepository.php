<?php

namespace App\Repository\Item;

use App\Entity\Invoice\invoiceEntity;
use App\Models\invoice;
use App\Models\item;

class ItemRepository implements itemInterface{

    public function crear(array $items):void
    {
        item::create($items);
    }

    public function eliminar(string $uuid):void
    {
        item::destroy($uuid);
    }

    public function Buscar(int $uuid):?invoice
    {
        $items = item::where('factura_id', $uuid)->all();
        return $items;
    }

    public function Modificar(invoice $estudianteActual, invoiceEntity $DTOestudiante): void
    {
        $estudianteActual->fromDTO($DTOestudiante);
        $estudianteActual->save(); 
    }
}
?>