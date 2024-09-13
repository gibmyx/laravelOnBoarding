<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected function nombre():Attribute{
        return Attribute::make(
            set:function($value){
            return strtolower($value);
        },
            get:function($value){
                return ucfirst($value);
            }
    
    );
    }
}
