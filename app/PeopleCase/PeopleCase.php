<?php

namespace App\PeopleCase;

use App\Repository\PeopleRepository;

class PeopleCase{
    public static function ListarPeople(){
        $personas = PeopleRepository::Listar();
        return $personas;
    }
}

?>