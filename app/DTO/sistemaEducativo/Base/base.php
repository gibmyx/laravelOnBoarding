<?php

namespace App\Dto\SistemaEducativo\Base;

abstract class Base {
    protected $nombre;
    protected $apellido;
    protected $cedula;
    protected $edad;
    protected $genero;

    public function __construct(
        string $nombre,
        string $apellido,
        int $cedula,
        int $edad,
        string $genero
    )
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->edad = $edad;
        $this->genero = $genero;
    }

    public function getNombre():string{
        return $this->nombre;
    }

    public function getApellido():string{
        return $this->apellido;
    }

    public function getCedula():int
    {
        return $this->cedula;
    }

    public function getEdad():int{
        return $this->edad;
    }

    public function getGenero():string{
        return $this->genero;
    }
}