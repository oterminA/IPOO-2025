<?php
include_once('Linea.php');

$objLinea = new Linea(1,1,5,3);
echo $objLinea;
$derecha = $objLinea->mueveDerecha(2);
echo "----La linea se movió a la derecha, los nuevos puntos son: " . $objLinea ."\n";
$derecha = $objLinea->mueveIzquierda(3);
echo "----La linea se movió a la izquierda, los nuevos puntos son: " . $objLinea ."\n";
$derecha = $objLinea->mueveArriba(1);
echo "----La linea se movió arriba, los nuevos puntos son: " . $objLinea ."\n";
$derecha = $objLinea->mueveAbajo(5);
echo "----La linea se movió abajo, los nuevos puntos son: " . $objLinea ."\n";