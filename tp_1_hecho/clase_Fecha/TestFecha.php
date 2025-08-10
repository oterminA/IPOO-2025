<?php
include_once('Fecha.php');

$objFecha = new Fecha(20,9,1998);
echo $objFecha . "\n";
echo "Fecha modificada: \n";
$objFecha->setDia(5);
$objFecha->setMes(3);
$objFecha->setAnio(2023);
echo $objFecha;
echo "-----------\n";
echo "Ingrese dia, mes y año.\n";
$dia = trim(fgets(STDIN));
$mes = trim(fgets(STDIN));
$anio = trim(fgets(STDIN));
$objFecha2 = new Fecha($dia, $mes, $anio);
echo $objFecha2;
echo "Ingrese la cantidad de dias que desea incrementar y la fecha a modificar:\n";
$dias = trim(fgets(STDIN));
$fecha = trim(fgets(STDIN));
$incrementoFecha = $objFecha2->incremento($dias, $fecha); //o sea tendria que resultar 25,09,1998
echo "Fecha incrementada: " . $incrementoFecha . "\n";