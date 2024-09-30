<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'lastname', 'cedula', 'age', 'gender', 'grade', 'n_subjects', 'notes'];
}