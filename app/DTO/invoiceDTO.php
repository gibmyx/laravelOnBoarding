<?php

namespace App\DTO;

use App\Models\invoice;

class invoiceDTO
{
    private $id;
    private $codigo;
    private $estado;
    private $proveedor_id;
    private $subtotal;
    private $impuesto;
    private $descuento;
    private $total;

    public function __construct(array $invoiceData)
    {
        $this->id = $invoiceData ['id'];
        $this->codigo = $invoiceData ['codigo'];
        $this->estado = $invoiceData ['estado'];
        $this->proveedor_id =  $invoiceData ['proveedor_id'];
        $this->subtotal = $invoiceData ['subtotal'];
        $this->impuesto = $invoiceData ['impuesto'];
        $this->descuento = $invoiceData ['descuento'];
        $this->total = $invoiceData ['total'];
    }

    public function getId(){
        return $this->id;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getProveedor(){
        return $this->proveedor_id;
    }

    public function getSubtotal(){
        return $this->subtotal;
    }

    public function getImpuesto(){
        return $this->impuesto;
    }

    public function getDescuento(){
        return $this->descuento;
    }

    public function getTotal(){
        return $this->total;
    }

    public function getData():array
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'estado' => $this->estado,
            'proveedor_id' => $this->proveedor_id,
            'subtotal' => $this->subtotal,
            'impuesto' => $this->impuesto,
            'descuento' => $this->descuento,
            'total' => $this->total,
        ];
    }
}