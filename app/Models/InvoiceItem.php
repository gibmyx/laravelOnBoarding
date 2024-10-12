<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'invoice_id',
        'item_id',
        'unit_price',
        'quantity',
        'subtotal',
        'tax',
        'discount',
        'total',
    ];
    
}
