<?php

use function PHPSTORM_META\map;

include_once 'Banco.php';
include_once 'Persona.php';
include_once 'Mostrador.php';
include_once 'Tramite.php';
include_once 'Cola.php';

$objCliente1 = new Persona("Carla", "Mendez", "DNI", 23573591, "Activacion tarjeta");
$objCliente2 = new Persona("Nora", "Pelaez", "DNI", 16254961, "Recuperacion pin tarjeta");
$objCliente3 = new Persona("Roberto", "Ibañez", "DNI", 11147963, "Recuperacion pin tarjeta");
$objCliente4 = new Persona("Luis", "Fernandez", "DNI", 30456789, "Solicitud de préstamo personal");
$objCliente5 = new Persona("Andrea", "Gomez", "DNI", 27845123, "Actualización de datos personales");
$objCliente6 = new Persona("Jorge", "Sanchez", "DNI", 18975342, "Reclamo por cobro indebido");
$objCliente7 = new Persona("Marina", "Lopez", "DNI", 22345678, "Reposición de tarjeta");
$objCliente8 = new Persona("Esteban", "Rojas", "DNI", 19678453, "Cierre de cuenta");


$objCola1 = new Cola([$objCliente1, $objCliente2, $objCliente3], 10);
$objCola2 = new Cola([$objCliente4, $objCliente5, $objCliente6], 5);
$objCola3 = new Cola([$objCliente7, $objCliente8], 12);

$creacionT1 = ["hora" => 10, "minutos" => 30];
$resolucionT1 = ["hora" => 12, "minutos" => 55];

$creacionT2 = ["hora" => 7, "minutos" => 20];
$resolucionT2 = ["hora" => 7, "minutos" => 40];

$creacionT3 = ["hora" => 11, "minutos" => 15];
$resolucionT3 = ["hora" => 12, "minutos" => 00];

$creacionT4 = ["hora" => 9, "minutos" => 45];
$resolucionT4 = ["hora" => 10, "minutos" => 30];

$creacionT5 = ["hora" => 14, "minutos" => 10];
$resolucionT5 = ["hora" => 15, "minutos" => 5];

$creacionT6 = ["hora" => 8, "minutos" => 0];
$resolucionT6 = ["hora" => 8, "minutos" => 25];

$creacionT7 = ["hora" => 13, "minutos" => 20];
$resolucionT7 = ["hora" => 14, "minutos" => 0];

$creacionT8 = ["hora" => 16, "minutos" => 45];
$resolucionT8 = ["hora" => 17, "minutos" => 30];


$objTramite1 = new Tramite("Activacion tarjeta", $creacionT1, $resolucionT1);
$objTramite2 = new Tramite("Creacion caja ahorro", $creacionT2, $resolucionT2);
$objTramite3 = new Tramite("Recuperacion pin tarjeta", $creacionT3, $resolucionT3);
$objTramite4 = new Tramite("Solicitud de préstamo personal", $creacionT4, $resolucionT4);
$objTramite5 = new Tramite("Actualización de datos personales", $creacionT5, $resolucionT5);
$objTramite6 = new Tramite("Reclamo por cobro indebido", $creacionT6, $resolucionT6);
$objTramite7 = new Tramite("Reposición de tarjeta", $creacionT7, $resolucionT7);
$objTramite8 = new Tramite("Cierre de cuenta", $creacionT8, $resolucionT8);

$objMostrador1 = new Mostrador([$objTramite1, $objTramite2, $objTramite3], $objCola1);
$objMostrador2 = new Mostrador([$objTramite4, $objTramite5, $objTramite6], $objCola2);
$objMostrador3 = new Mostrador([$objTramite7, $objTramite8], $objCola3);

$objBanco = new Banco([$objMostrador1, $objMostrador2, $objMostrador3]);

////////

echo ">Mostrando datos del banco-----\n" . $objBanco;

echo ">Tramite a atender por mostrador 1: ";
$tramite = trim(fgets(STDIN));
$atiende = $objMostrador1->atiende($tramite);
if ($atiende) {
    echo "El tramite que busca se puede atender en Mostrador 1\n";
} else {
    echo "No se puede atender ese tramite en este mostrador. Intentaremos con otro.\n";
    $atiende = $objMostrador2->atiende($tramite);
    if ($atiende) {
        echo "El tramite que busca se puede atender en Mostrador 2\n";
    } else {
        echo "No se puede atender ese tramite en este mostrador.Intentaremos con otro.\n";
        $atiende = $objMostrador3->atiende($tramite);
        if ($atiende) {
            echo "El tramite que busca se puede atender en Mostrador 3\n";
        } else {
            echo "No hay mostradores que puedan atender su tramite.\n";
        }
    }
}


echo ">Mostrar todos los mostradores que atienden el tramite: ";
$otroTramite = trim(fgets(STDIN));
$mostradoresXTramite = $objBanco->mostradoresQueAtienden($otroTramite);
if($mostradoresXTramite !== []){
    echo "Los mostradores que atienden ese tramite son: \n";
    foreach ($mostradoresXTramite as $tramite) {
        echo $tramite . "\n";
    }
}else{
    echo "No hay mostradores para atender su tramite.\n";
}
//no entiendo cómo deberian mostrarse los mostradores, xq si se muestran solo los que hacen cierto tramite, por como estan formadas las clases, cada mostrador tiene una coleccion de tramites y todo bien con esa parte, pero los tramites tienen $tipoTramite, $horarioCreacion, $horarioResolucion y no tiene sentido mostrar eso


echo ">Ingrese un tramite para asignarlo al mostrador con la cola de clientes más corta: ";
$unTramite = trim(fgets(STDIN));
$mejorMostrador = $objBanco->mejorMostradorPara($unTramite);
if ($mejorMostrador !== null){
    echo "El mejor mostrador para atenderlo es: " . $mejorMostrador . "\n";
}else{
    echo "Por el momento no hay mejores mostradores para atender su tramite.\n";
}


echo ">Estamos buscando un mostrador para usted...\n";
//para no hacerlo tan largo, solo voy a poner uno de los obj cliente que ya hice
$mostradorAsignado = $objBanco->atender($objCliente5);
if ($mostradorAsignado !== null){
    echo "El cliente fue asignado al siguiente mostrador:\n" . $mostradorAsignado . "\n";
} else {
    echo "Será atendido en cuanto haya lugar en un mostrador.\n";
}