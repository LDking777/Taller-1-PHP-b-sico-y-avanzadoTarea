<?php

echo "Taller php! <br>";

echo "Jhoann Esteban Reyes Higuera <br>";

/* punto 1
Usando los conocimientos adquiridos hasta el momento en la materia, crear una aplicación en
PHP que realice las siguientes operaciones:
1. Dado un arreglo de estudiantes donde cada uno tiene nombre, calificación final y carrera,
realiza las siguientes operaciones en PHP: .*/

$Estudiantes = [
    ["nombre" => "Jhoann", "calificacion" => 42, "carrera" => "Ingeniería"],
    ["nombre" => "Pepinop", "calificacion" => 50, "carrera" => "Medicina"],
    ["nombre" => "Pipe", "calificacion" => 32, "carrera" => "Geología"],
    ["nombre" => "jesus", "calificacion" => 38, "carrera" => "Medicina"],
    ["nombre" => "Luis", "calificacion" => 20, "carrera" => "Ingeniería"]
];

// a. Calcular el promedio de calificaciones por cada carrera.$sumaCalificacionesInge = 0; 
$sumaCalificacionesInge = 0;
$contadorInge = 0;
$sumaCalificacionesMedi = 0;
$contadorMedi = 0;
$sumaCalificacionesGeo = 0;
$contadorGeo = 0;

foreach ($Estudiantes as $estudiante) {
    if ($estudiante['carrera'] === "Ingeniería") {
        $sumaCalificacionesInge += $estudiante['calificacion'];
        $contadorInge++;
        $PromCalificacionesInge = $sumaCalificacionesInge / $contadorInge;
    }
}

echo ("El promedio de calificaciones para Ingeniería es: $PromCalificacionesInge <br>");

foreach ($Estudiantes as $estudiante) {
    if ($estudiante['carrera'] === "Medicina") {
        $sumaCalificacionesMedi += $estudiante['calificacion'];
        $contadorMedi++;
        $PromCalificacionesMedi = $sumaCalificacionesMedi / $contadorMedi;
    }
}

echo ("El promedio de calificaciones para Medicina es: $PromCalificacionesMedi <br>");

foreach ($Estudiantes as $estudiante) {
    if ($estudiante['carrera'] === "Geología") {
        $sumaCalificacionesGeo += $estudiante['calificacion'];
        $contadorGeo++;
        $PromCalificacionesGeo = $sumaCalificacionesGeo / $contadorGeo;
    }
}

echo ("El promedio de calificaciones para Geología es: $PromCalificacionesGeo <br>");

// b. Determinar cuál es la carrera que tiene el promedio de calificaciones más bajo (la de mayor dificultad académica). 

if ($PromCalificacionesGeo < $PromCalificacionesInge && $PromCalificacionesGeo < $PromCalificacionesMedi) {
    echo ("La carrera que tiene el promedio de calificaciones más bajo es Geología <br>");
} elseif ($PromCalificacionesInge < $PromCalificacionesMedi && $PromCalificacionesInge < $PromCalificacionesGeo) {
    echo ("La carre que tiene el promedio de calificaciones más bajo es Ingeniería <br>");
} else {
    echo ("La carrera que tiene el promedio de calificaciones más bajo es Medicina <br>");
}

// c. Listar los nombres de los estudiantes que tienen una calificación superior al promedio de su respectiva carrera. 

echo ("Estudiantes con calificaciones mayores al promedio de su carrera:<br>");
foreach ($Estudiantes as $estudiante) {
    if ($estudiante['carrera'] === "Ingeniería" && $estudiante['calificacion'] > $PromCalificacionesInge) {
        echo ($estudiante['nombre'] . "<br>");
    } elseif ($estudiante['carrera'] === "Medicina" && $estudiante['calificacion'] > $PromCalificacionesMedi) {
        echo ($estudiante['nombre'] . "<br>");
    } elseif ($estudiante['carrera'] === "Geología" && $estudiante['calificacion'] > $PromCalificacionesGeo) {
        echo ($estudiante['nombre'] . "<br>");
    }
}

/* punto 2*/
/* 2. Dado un arreglo asociativo $envios que almacena la información de las entregas
realizadas por una empresa de mensajería con los siguientes datos:
a. ID del envío.
b. Ciudad de destino.
c. Nombre del transportista.
d. Peso del paquete (en kg).
e. Costo por kilo.
f. Estado del envío (Entregado, En ruta, Cancelado).
Realizar los siguientes cálculos: */

$envios = [
    ["ID" => 101, "Ciudad" => "Bogotá", "Transportista" => "Transportes Rápidos", "Peso" => 5, "CostoKilo" => 10, "Estado" => "Entregado"],
    ["ID" => 102, "Ciudad" => "Medellín", "Transportista" => "Envíos Express", "Peso" => 3, "CostoKilo" => 12, "Estado" => "En ruta"],
    ["ID" => 103, "Ciudad" => "Cali", "Transportista" => "Transportes Rápidos", "Peso" => 8, "CostoKilo" => 9, "Estado" => "Entregado"],
    ["ID" => 104, "Ciudad" => "Bogotá", "Transportista" => "Envíos Express", "Peso" => 2, "CostoKilo" => 11, "Estado" => "Cancelado"],
    ["ID" => 105, "Ciudad" => "Medellín", "Transportista" => "Transportes Rápidos", "Peso" => 4, "CostoKilo" => 10, "Estado" => "Entregado"]
];

// 1. Calcular el costo total de todos los envíos cuyo estado sea "Entregado" (Peso * Costo por kilo). 

$costoTotalEntregado = 0;

foreach ($envios as $envio) {
    if ($envio['Estado'] === "Entregado") {
        $costoTotalEntregado += $envio['Peso'] * $envio['CostoKilo'];
    }
}

echo ("El costo total de los envíos entregados es: $costoTotalEntregado <br>");

// 2. Encontrar la ciudad de destino que ha recibido la mayor cantidad de peso total (suma de kilogramos).  
$pesoPorCiudad = [];
foreach ($envios as $envio) {
    if (!isset($pesoPorCiudad[$envio['Ciudad']])) {
        $pesoPorCiudad[$envio['Ciudad']] = 0;
    }
    $pesoPorCiudad[$envio['Ciudad']] += $envio['Peso'];
}
$ciudadMayorPeso = "";
$pesoMayor = 0;
foreach ($pesoPorCiudad as $ciudad => $peso) {
    if ($peso > $pesoMayor) {
        $pesoMayor = $peso;
        $ciudadMayorPeso = $ciudad;
    }
}

echo ("La ciudad de destino que ha recibido la mayor cantidad de peso total es: $ciudadMayorPeso con $pesoMayor kg <br>");

// 3. Determinar cuál es el transportista que ha realizado la mayor cantidad de entregas exitosas. 

$entregasPorTransportista = [];
foreach ($envios as $envio) {
    if ($envio['Estado'] === "Entregado") {
        $t = $envio['Transportista'];
        $entregasPorTransportista[$t] = ($entregasPorTransportista[$t] ?? 0) + 1;
    }
}

$maxEntregas = 0;
$topTransportista = "";
foreach ($entregasPorTransportista as $transp => $cant) {
    if ($cant > $maxEntregas) {
        $maxEntregas = $cant;
        $topTransportista = $transp;
    }
}
echo "El transportista con más entregas exitosas es: $topTransportista con $maxEntregas <br>"; 