<?php
include_once 'Agencia.php';
include_once 'Cliente.php';
include_once 'Destino.php';
include_once 'Ventas.php';
include_once 'Online.php';
include_once 'Paquetes_turisticos.php';
/*7.5. Implementar un script Test_Agencia donde:*/
//a) se crea una instancia de la clase Destino con los siguientes valores: lugar =“Bariloche”, valorDia =250. 
$objDestino = new Destino(0024, "Bariloche", 250);

$objDestino2 = new Destino(0047, "Cordoba", 3600);


//b) se crea una instancia de la clase PaqueteTuristico referenciando al destino creado en (a) con los siguientes valores: fdesde = 23/05/2014 cantDias= 3, totalPlazas = 25.
$objPaquete = new Paquetes_turisticos(00254, "23/05/2014", 3, $objDestino, 25, 10);

$objPaquete2 = new Paquetes_turisticos(0014, "3/8/2012", 5, $objDestino2, 50, 35);


//c) se crea instancia de la clase Agencia.
$objCliente = new Cliente("DNI", 41254308);
$objVenta= new Ventas("23/05/2014", $objPaquete, 10, $objCliente);
$objVenta2= new Ventas("3/8/2012", $objPaquete2, 10, $objCliente);


$objOnline = new Online("12/08/2015", $objPaquete2, 15, $objCliente);
$objOnline2 = new Online("1/1/2012", $objPaquete2, 20, $objCliente);


$agencia = new Agencia([$objPaquete, $objPaquete2], [$objVenta, $objVenta2], [$objOnline, $objOnline2]);

//d) se invoca al método incorporarPaquete de la agencia con el paquete creado en (b).
$incorporar = $agencia->incorporarPaquete($objPaquete);

//e) se invoca nuevamente al método incorporarPaquete de la agencia con el paquete creado en (b).
if ($incorporar){
    echo "\n >El paquete fue incorporado con exito.\n";
}else{
    echo "\n >Hubo un error con la incorporacion del paquete.\n";
}

//f) se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con los siguientes datos del cliente: número de documento 27898654, y tipo de documento DNI, cantidad de personas que viaja: 5, y no es una venta online.
$cliente2=new Cliente("DNI", 27898654);
$incorporarVenta = $agencia->incorporarVenta($objPaquete, $cliente2,5, false);
if ($incorporarVenta <> -1){
    echo "\n >El importe que debe abonarse para concretar esta venta es: $" . $incorporarVenta;
}else{
    echo "\n> No se puede realizar la venta.\n";
}

//g) se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que viaja: 4, y es una venta online.
$incorporarVenta = $agencia->incorporarVenta($objPaquete, $cliente2,4, true);
if ($incorporarVenta <> -1){
    echo "\n >El importe que debe abonarse para concretar esta venta es: $" . $incorporarVenta;
}else{
    echo "\n> No se puede realizar la venta.\n";
}

//h) se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que viaja: 15, y es una venta online
$incorporarVenta = $agencia->incorporarVenta($objPaquete, $cliente2,15, true);
if ($incorporarVenta <> -1){
    echo "\n >El importe que debe abonarse para concretar esta venta es: $" . $incorporarVenta;
}else{
    echo "\n> No se puede realizar la venta.\n";
}