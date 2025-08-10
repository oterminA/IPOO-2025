<?php
include_once('Reloj.php');

$objReloj = new Reloj(23,59,58);


echo $objReloj . "\n"; 
$objReloj->incremento();
echo $objReloj . "\n";  
$objReloj->incremento();
echo $objReloj . "\n";
$objReloj->incremento();
echo $objReloj . "\n";


$objReloj2 = new Reloj(20,05,58);
echo $objReloj2 . "\n"; 
$objReloj2->incremento();
echo $objReloj2;  
$objReloj2->puesta_a_cero();
echo $objReloj2 . "<-- Puesta a cero del reloj.\n";