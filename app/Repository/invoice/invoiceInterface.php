<?php

namespace App\Repository\Invoice;

use App\Entity\Invoice\invoiceEntity;
use App\Models\invoice;

interface invoiceInterface{
    public function Buscar(string $uuid):?invoiceEntity;
    public function crear(array $invoice):void;
    public function Modificar():void;
}
?>