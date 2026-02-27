<?php
namespace App\Models;

class Personaje {
    public $nombre;
    public function __construct($n) {
        $this->nombre = $n;
    }
}