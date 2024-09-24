<?php

namespace App\Dto\SistemaEducativo\Profesor;

use App\Dto\SistemaEducativo\Base\Base;
use Illuminate\Http\Request;

class Profesor extends Base{
    private $titulo_universitario;
    private $materia_asignada;
    private $horas_asignadas;

    public function __construct(Request $request)
    {
        parent::__construct(
            $request->nombre,
            $request->apellido,
            $request->cedula,
            $request->edad,
            $request->genero
        );
        $this->titulo_universitario = $request->titulo_universitario;
        $this->materia_asignada = $request->materia_asignada;
        $this->horas_asignadas = $request->horas_asignadas;
    }

    public function getTituloUniversitario():string{
        return $this->titulo_universitario;
    }

    public function getMateriaAsignada():string{
        return $this->materia_asignada;
    }

    public function getHorasAsignadas():int{
        return $this->horas_asignadas;
    }
}