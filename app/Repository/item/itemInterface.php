<?php

namespace App\Repository\Item;

use App\DTO\itemEntity;
use App\Entity\Invoice\invoiceEntity;
use App\Models\item;

interface itemInterface{
    public function Buscar():?itemEntity;
    public function eliminar(string $uuid):void;
    public function crear(array $items):void;
    public function Modificar():void;
}
?>