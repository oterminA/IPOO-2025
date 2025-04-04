<?php
include_once 'Cafetera.php';

//PROGRAMA PRINCIPAL
//int $capacidadMaxima, $cantidadActual, $cantidad, $servido, $agregar
//string $rta, $res, $respuesta
//array 
//float

echo ">Ingrese la capacidad máxima de la cafetera: \n";
$capacidadMaxima = trim(fgets(STDIN));
do {
    echo ">Ingrese la cantidad actual de café que tiene la cafetera: \n";
    $cantidadActual =  trim(fgets(STDIN));
} while ($cantidadActual > $capacidadMaxima);


$taza1 = new Cafetera($capacidadMaxima, $cantidadActual);

if ($taza1->llenarCafetera() == 1) {
    echo ">La cafetera se llenó.\n";
} else {
    echo ">No se alcanzó a llenar la cafetera.\n";
}

echo ">Desea servirse una taza de café? (SI-NO)\n";
$rta = trim(fgets(STDIN));
if ($rta == "si") {
    echo ">Ingrese la capacidad de su taza:\n";
    $cantidad = trim(fgets(STDIN));
    $servido = $taza1->servirTaza($cantidad);
    if ($servido < $cantidad) {
        echo ">No se alcanzó a llenar la taza, solo se sirvieron " . $servido . "cc.\n";
    } else {
        echo ">Taza llena con " . $servido . "cc.\n";
    }
}

echo ">Desea vaciar la cafetera? (SI-NO)\n";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "si") {
    echo ">La cafetera quedó en " . $taza1->vaciarCafetera() . "cc. \n";
} else {
    echo ">No se vació la cafetera.\n";
}

echo ">Desea agregar más a la cafetera? (SI-NO)\n";
$res = trim(fgets(STDIN));
if ($res == "si") {
    echo ">Cuánto café desea agregar?\n";
    $cantidad = trim(fgets(STDIN));
    while ($cantidad > $capacidadMaxima) {
        echo ">La cantidad que quiere agregar sobrepasa la capacidad de la cafetera. Intente agregar otra cantidad.\n";
        $cantidad = trim(fgets(STDIN));
    }
    $agregar = $taza1->agregarCafe($cantidad);
    echo ">Se agregó el café. \n";
} else {
    echo ">No se agregó café.\n";
}

echo $taza1;
