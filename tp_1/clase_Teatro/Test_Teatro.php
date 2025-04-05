<?php
include_once 'Teatro.php';


echo ">Ingrese el nombre del teatro: ";
$nombreTeatro = trim(fgets(STDIN));

echo ">Ingrese la dirección del teatro: ";
$direccionTeatro = trim(fgets(STDIN));

$funciones = [];
for ($i = 0; $i < 4; $i++) {
    echo ">Nombre de la función " . ($i + 1) . ": ";
    $nombreFuncion = trim(fgets(STDIN));
    echo ">Precio de la función: ";
    $precioFuncion = trim(fgets(STDIN));
    $funciones[] = [
        "nombre" => $nombreFuncion,
        "precio" => $precioFuncion
    ];
}

$teatro1 = new Teatro($nombreTeatro, $direccionTeatro, $funciones);

echo ">Ingrese un nuevo nombre para el teatro: ";
$nuevoNombre = trim(fgets(STDIN));
$teatro1->cambiarNombreTeatro($nuevoNombre);

echo ">Ingrese una nueva dirección para el teatro: ";
$nuevaDireccion = trim(fgets(STDIN));
$teatro1->cambiarDireccionTeatro($nuevaDireccion);

echo ">¿Qué número de función desea modificar? ";
$indiceFuncion = (trim(fgets(STDIN)) - 1);
echo ">Nuevo nombre de la función: ";
$nuevoNombreFuncion = trim(fgets(STDIN));
echo ">Nuevo precio de la función: ";
$nuevoPrecioFuncion = trim(fgets(STDIN));
$teatro1->cambiarFuncion($indiceFuncion, $nuevoNombreFuncion, $nuevoPrecioFuncion);
//quiero hacer un if antes, para validar que el índice exista dentro del rango pero no puedo por los parámetros

echo $teatro1;
