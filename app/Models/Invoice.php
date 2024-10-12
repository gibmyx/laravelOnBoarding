<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'status',
        'provider_id',
        'subtotal',
        'tax',
        'discount',
        'total',
    ];
    
}
