<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DTO\InvoiceDTO;

class InvoiceModel extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = [
        'id',
        'codigo',
        'estado',
        'proveedor_id',
        'subtotal',
        'impuesto',
        'descuento',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(ItemModel::class, 'factura_id');
    }

    public function updateFromDTO(InvoiceDTO $invoiceDTO): void
    {
        $this->id = $invoiceDTO->getId();
        $this->codigo = $invoiceDTO->getCodigo();
        $this->estado = $invoiceDTO->getEstado();
        $this->proveedor_id = $invoiceDTO->getProveedorId();
        $this->subtotal = $invoiceDTO->getSubtotal();
        $this->impuesto = $invoiceDTO->getImpuesto();
        $this->descuento = $invoiceDTO->getDescuento();
        $this->total = $invoiceDTO->getTotal();
        $this->save();
    }
}
