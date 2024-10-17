<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DTO\ItemDTO;

class ItemModel extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'factura_id',
        'item_id',
        'precio_unitario',
        'cantidad',
        'subtotal',
        'impuesto',
        'descuento',
        'total',
    ];

    public function invoice()
    {
        return $this->belongsTo(InvoiceModel::class, 'factura_id');
    }

    public function updateFromDTO(ItemDTO $itemDTO): void
    {
        $this->factura_id = $itemDTO->getFacturaId();
        $this->item_id = $itemDTO->getItemId();
        $this->precio_unitario = $itemDTO->getPrecioUnitario();
        $this->cantidad = $itemDTO->getCantidad();
        $this->subtotal = $itemDTO->getSubtotal();
        $this->impuesto = $itemDTO->getImpuesto();
        $this->descuento = $itemDTO->getDescuento();
        $this->total = $itemDTO->getTotal();
        $this->save();
    }
}
