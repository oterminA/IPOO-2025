<?php

/* Se crea 1 instancia de la clase CabinaPeaje. 
Se crean 3 instancias de RegistroVehículo , 1 correspondiente a un Scania, 1 a una Trafic que funciona como transporte escolar, 1 a un Toyota Corolla. Los demás atributos/características pueden contener los valores que defina
Invocar con cada instancia del inciso anterior al método valorPeaje() y visualizar el resultado.
.*/

include_once 'Recibos.php';
include_once 'CabinaPeaje.php';
include_once 'RegistrosVehiculo.php';
include_once 'RegistrosCamiones.php';
include_once 'RegistrosEscolares.php';

$objCabina = new CabinaPeaje([$reciboScania, $reciboTraffic, $reciboCorolla], [$objScania, $objTraffic, $objCorolla]);

$objScania = new RegistrosCamiones(85474, 8000, 6);
$objTraffic = new RegistrosEscolares(86955, 12);
$objCorolla = new RegistrosVehiculo(547896);

$reciboScania = new Recibos(12, 2000, "12/02/2024", "14:00", $objScania);
$reciboTraffic = new Recibos(25, 3000, "15/06/2024", "20:30", $objTraffic);
$reciboCorolla = new Recibos(8,6000,"15/06/2024", "08:30", $objCorolla);


echo "*****PEAJE SCANIA****** $" . $objScania->valorPeaje() . "\n";
echo "*****PEAJE TRAFFIC****** $" . $objTraffic->valorPeaje() . "\n";
echo "*****PEAJE COROLLA****** $" . $objCorolla->valorPeaje() . "\n";


/*
Invocar al método cobrarPeaje() y visualizar el resultado.. 
Invocar al método reciboMayorMonto(“15/06/2024”) a partir de la instancia CabinaPeaje y visualizar el resultado. 
Invocar al método totalRecaudado(“15/06/2024”) a partir de la instancia CabinaPeaje y visualizar el resultado*/


$recibo1 = $objCabina->cobrarPeaje("Camion", $reciboScania);
$recibo2 = $objCabina->cobrarPeaje("Escolar", $reciboTraffic);
$recibo3 = $objCabina->cobrarPeaje("Particular", $reciboCorolla);

echo "*************Recibo 1:\n" . $recibo1 . "\n";
echo "*************Recibo 2:\n" . $recibo2 . "\n";
echo "*************Recibo 3:\n" . $recibo3 . "\n";

echo "*************Recibo de mayor monto (15/06/2024):\n";
echo $objCabina->reciboMayorMonto("15/06/2024") . "\n";

echo "*************Total recaudado el 15/06/2024: $";
echo $objCabina->totalRecaudado("15/06/2024") . "\n";

?>



