<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorModel extends Model
{
    use HasFactory;

    protected $table = 'professors';

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'cedula',
        'age',
        'gender',
        'u_degrees',
        'a_subjects',
        'hours_a'
    ];
}
