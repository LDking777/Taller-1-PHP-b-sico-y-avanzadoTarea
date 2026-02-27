<?php
namespace App\Models;

class CalculadoraModel {
    public function ObtenerNeto($cantidad) {
        return $cantidad * 0.10; 
    }
}