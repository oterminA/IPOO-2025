<?php
include_once('Cuadrado.php');

$verticeA = ["x" => 1,
            "y" => 1];
$verticeB = ["x" => 3,
            "y" => 1];
$verticeC = ["x" => 3,
            "y" => 3];            
$verticeD = ["x" => 1,
            "y" => 3];


$objCuadrado = new Cuadrado($verticeA, $verticeB, $verticeC, $verticeD);
echo "Medidas del cuadrado: \n" . $objCuadrado ;
$area = $objCuadrado->area();
echo "Area del cuadrado: " . $area . "\n";
$aumento = $objCuadrado->aumentarTamanio(2);
echo "Medidas con el aumento aplicado: \n" . $objCuadrado;
$area = $objCuadrado->area();
echo "Area nueva del cuadrado: " . $area . "\n";
/*con los vertices que puse, las medidas deberian ser 
A'(2, 2)
B'(6, 2)
C'(6, 6)
D'(2, 6)*/