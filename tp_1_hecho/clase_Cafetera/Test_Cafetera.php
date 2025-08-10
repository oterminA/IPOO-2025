<?php
include_once 'Cafetera.php';
//PROGRAMA PRINCIPAL
//int $capacidadMaxima, $cantidadActual, $cantidad, $servido, $agregar
//string $rta, $res, $respuesta
//array 
//float

echo ">Ingrese la capacidad máxima de la cafetera: \n";
$capacidadMaxima = trim(fgets(STDIN));

do { // //en caso de que la capacidad actual sea mayor a la maxima, vuelvo a preguntar
    echo ">Ingrese la cantidad actual de café que tiene la cafetera: \n";
    $cantidadActual = trim(fgets(STDIN));
} while ($cantidadActual > $capacidadMaxima);

$taza1 = new Cafetera($capacidadMaxima, $cantidadActual);

//xra llenar la cafetera
$llenar = $taza1->llenarCafetera();
if ($llenar == -1){
    echo ">No se llenó la cafetera.\n";
}else{
    echo ">Se llenó completamente la cafetera.\n";
}

// para servir una taza
echo ">Desea servirse una taza de café? (SI-NO)\n";
$rta = strtoupper(trim(fgets(STDIN)));
if ($rta == "SI") {
    echo ">Ingrese la capacidad de su taza:\n";
    $cantidad = trim(fgets(STDIN));
    $servir = $taza1->servirTaza($cantidad);
    if ($servir < $cantidad) {
        echo ">No se alcanzó a llenar la taza, solo se sirvieron " . $servir . "cc.\n";
    } else {
        echo ">Taza llena con " . $servir . "cc.\n";
    }
}

// para vaciar la cafetera
echo ">Desea vaciar la cafetera? (SI-NO)\n";
$respuesta = strtoupper(trim(fgets(STDIN)));
if ($respuesta == "SI") {
    echo ">La cafetera quedó en " . $taza1->vaciarCafetera() . "cc. \n";
} else {
    echo ">No se vació la cafetera.\n";
}

// para agregar café
echo ">Desea agregar más a la cafetera? (SI-NO)\n";
$res = strtoupper(trim(fgets(STDIN)));
if ($res == "SI") {
    echo ">Cuánto café desea agregar?\n";
    $cantidad = trim(fgets(STDIN));
    while ($cantidad > $capacidadMaxima) {
        ////deberia hacer algo para que solo tome la cantidad que alcanza y el sobrante lo deje?
        echo ">La cantidad que quiere agregar sobrepasa la capacidad de la cafetera. Intente agregar otra cantidad.\n";
        $cantidad = trim(fgets(STDIN));
    }
    $agregado = $taza1->agregarCafe($cantidad);
    if ($agregado != -1) {
        echo ">Se agregó el café a la cafetera de manera exitosa.\n";
    } else {
        echo ">No se pudo agregar esa cantidad (excede capacidad).\n";
    }
} else {
    echo ">No se agregó café.\n";
}

// xra mostrar los datos
echo ">Desea ver la información de la cafetera? (SI/NO)\n";
$respuesta = strtoupper(trim(fgets(STDIN)));
if ($respuesta == "SI") {
    echo $taza1;
} else {
    echo ">Los datos no se muestran.\n";
}
?>
