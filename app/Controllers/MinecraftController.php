<?php
namespace App\Controllers;

use App\Models\Personaje;
use App\Models\CalculadoraModel;

class MinecraftController {
    public function mostrar($nombre, $cantidad) {
        $pers = new Personaje($nombre);
        $calc = new CalculadoraModel();
        $resultado = $calc->ObtenerNeto($cantidad);

        return "El jugador {$pers->nombre} tiene $resultado créditos por los diamantes.";
    }
}