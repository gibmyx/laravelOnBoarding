<?php

namespace App\Dto\SistemaEducativo\Estudiante;

use App\Dto\SistemaEducativo\Base\Base;
use Illuminate\Http\Request;

class Estudiante extends Base{
    private $grado;
    private $cantidad_materia;
    private $nota;

    public function __construct(Request $request)
    {
        parent::__construct(
            $request->nombre,
            $request->apellido,
            $request->cedula,
            $request->edad,
            $request->genero
        );
        $this->grado = $request->grado;
        $this->cantidad_materia = $request->cantidad_materia;
        $this->nota = $request->nota;
    }

    public function getGrado():string{
        return $this->grado;
    }

    public function getCantidadMateria():int{
        return $this->cantidad_materia;
    }

    public function getNota():int{
        return $this->nota;
    }
}