<?php

namespace App\DTO;

namespace App\DTO;

class itemEntity{
    private $id;
    private $factura_id;
    private $item_id;
    private $precio_unitario;
    private $cantidad;
    private $subtotal;
    private $impuesto;
    private $descuento;
    private $total;

    public function __construct($itemData)
    {
        $this->id = $itemData ['id'];
        $this->factura_id = $itemData ['factura_id'];
        $this->item_id = $itemData ['item_id'];
        $this->precio_unitario =  $itemData ['precio_unitario'];
        $this->cantidad = $itemData ['cantidad'];
        $this->subtotal = $itemData ['subtotal'];
        $this->impuesto = $itemData ['impuesto'];
        $this->descuento = $itemData ['descuento'];
        $this->total = $itemData ['total'];
    }

    public function getData():array
    {
        return [
            'id' => $this->id,
            'factura_id' => $this->factura_id,
            'item_id' => $this->item_id,
            'precio_unitario' => $this->precio_unitario,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->subtotal,
            'impuesto' => $this->impuesto,
            'descuento' => $this->descuento,
            'total' => $this->total,
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFacturaId()
    {
        return $this->factura_id;
    }

    public function getItemId(){
        return $this->item_id;
    }

    public function getPrecioUnitario()
    {
        return $this->precio_unitario;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function getImpuesto()
    {
        return $this->impuesto;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getTotal()
    {
        return $this->total;
    }

}