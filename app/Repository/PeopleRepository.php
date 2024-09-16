<?php

namespace App\Repository;

use App\Models\Persona;
use Illuminate\Support\Collection;

class PeopleRepository{

    public static function Listar():Collection{
        $persona = Persona::all();
        return $persona;
    }
}
?>