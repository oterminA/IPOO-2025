<?php
include_once 'Empresa.php';
include_once 'Cliente.php';
include_once 'Venta.php';
include_once 'Moto.php';


//punto 1
echo "-------Punto 1-------\n";
$objCliente1 = new Cliente("Pipo", "Fernandez", "alta", "dni", 26354879);
$objCliente2 = new Cliente("Lila", "Dominguez", "alta", "dni", 41153759);


//punto 2
echo "-------Punto 2-------\n";
$objMoto1= new Moto(11,2230000,2022,"Benelli Imperiale 400", 85, true);
$objMoto2= new Moto(12,584000,2011,"Zanella Xr 150 Obc", 70, true);
$objMoto3= new Moto(13, 99990,2023,"Zanella Patagonian Eagle 250",55,false);


//punto 3 (dice 4 en el pdf)
echo "-------Punto 4-------\n";
$objEmpresa1 = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);
echo $objEmpresa1;


//punto 4 (dice 5 en el pdf)
echo "-------Punto 5-------\n";
$registro = $objEmpresa1->registrarVenta([11,12,13], $objCliente2);
if($registro === -1){
    echo ">No se pudo realizar la venta.\n";
}else{
    ">Se realizó la venta. El total es: $" . $registro . "\n";
}


//punto 5 (dice 6 en el pdf)
echo "-------Punto 6-------\n";
$registro2 = $objEmpresa1->registrarVenta([0], $objCliente2);
if($registro2 === -1){
    echo ">No se pudo realizar la venta.\n";
}else{
    ">Se realizó la venta. El total es: $" . $registro2 . "\n";
}


//punto 6 (dice 7 en el pdf)
echo "-------Punto 7-------\n";
$registro3 = $objEmpresa1->registrarVenta([2], $objCliente2);
if($registro3 === -1){
    echo ">No se pudo realizar la venta.\n";
}else{
    ">Se realizó la venta. El total es: $" . $registro3 . "\n";
}


//punto 7 (dice 8 en el pdf)
echo "-------Punto 8-------\n";
$venta1 = $objEmpresa1->retornarVentasXCliente("dni","26354879"); //puedo pasar los datos sin tener que escribirlos manualmente?
echo $venta1; 

//punto 8 (dice 9 en el pdf)
echo "-------Punto 9-------\n";
$venta2 = $objEmpresa1->retornarVentasXCliente("dni","41153759"); //puedo pasar los datos sin tener que escribirlos manualmente?
echo $venta2; 


//punto 9 (dice 10 en el pdf)
echo "-------Punto 10-------\n";
echo $objEmpresa1;


?>