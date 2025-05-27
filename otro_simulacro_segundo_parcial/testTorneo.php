<?php

include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Partido_Futbol.php");
include_once("Partido_Basquet.php");

//
$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);
//

/*Completar el script TestTorneo y:*/
//1. Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000. 
$objTorneo = new Torneo(100.000);

/*2. Completar el script testTorneo.php y:
a. crear 3 objetos partidos de Básquet  con la siguiente información:*/
$objEquipoBasquet1 = new Partido_Basquet(11,"2024-05-05", $objE7, $objE8);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoBasquet1->setCantGolesE1(80);
    $objEquipoBasquet1->setCantGolesE2(120);
    $objEquipoBasquet1->getCantidadInfracciones(7);

$objEquipoBasquet2 = new Partido_Basquet(12,"2024-05-06", $objE9, $objE10);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoBasquet2->setCantGolesE1(81);
    $objEquipoBasquet2->setCantGolesE2(110);
    $objEquipoBasquet2->getCantidadInfracciones(8);

$objEquipoBasquet3 = new Partido_Basquet(13,"2024-05-07", $objE11, $objE12);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoBasquet3->setCantGolesE1(115);
    $objEquipoBasquet3->setCantGolesE2(85);
    $objEquipoBasquet3->getCantidadInfracciones(9);

//b. Crear 3 objetos partidos de Fútbol con la siguiente información
$objEquipoFutbol1 = new Partido_Futbol(14, "2024-05-07", $objE1, $objE2);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoFutbol1->setCantGolesE1(3);
    $objEquipoFutbol1->setCantGolesE2(2);

$objEquipoFutbol2 = new Partido_Futbol(15, "2024-05-08", $objE3, $objE4);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoFutbol2->setCantGolesE1(0);
    $objEquipoFutbol2->setCantGolesE2(1);

$objEquipoFutbol3 = new Partido_Futbol(16, "2024-05-09", $objE5, $objE6);
    //agrego la info que está en la tabla pero que yo elegi que no reciba como parametro:
    $objEquipoFutbol3->setCantGolesE1(2);
    $objEquipoFutbol3->setCantGolesE2(3);


//3. Completar el script testTorneo.php para invocar al método : 
    //a. ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la (cantidad de equipos del torneo ????????????).
$ingresarPartido1 = $objTorneo -> ingresarPartido($objE5, $objE11, "2024-05-23", "Futbol");
echo "------------PARTIDO 1------------\n";
if ($ingresarPartido1 <> null){
    echo "El partido es: " . $ingresarPartido1 ."\n";
}else{
    echo "¡ERROR!.\n";
}

    //b. ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo.
$ingresarPartido2 = $objTorneo -> ingresarPartido($obj11, $objE11, "2024-05-23", "Basquet");
echo "------------PARTIDO 2------------\n";
if ($ingresarPartido2 <> null){
    echo "El partido es: " . $ingresarPartido2 ."\n";
}else{
    echo "¡ERROR!.\n";
}
    //c. ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo.
$ingresarPartido3 = $objTorneo -> ingresarPartido($objE9, $objE10, "2024-05-25", "Basquet");
echo "------------PARTIDO 3------------\n";
if ($ingresarPartido3 <> null){
    echo "El partido es: " . $ingresarPartido3 ."\n";
}else{
    echo "¡ERROR!.\n";
}
    //d. darGanadores(‘basquet’) y visualizar el resultado.
$darGanadores = $objTorneo->darGanadores("Basquet");
echo "------------GANADORES------------\n";
if ($darGanadores <> null){
    echo "Los ganadores son: \n" . $darGanadores ."\n";
}else{
    echo "¡ERROR!.\n";
}
    //e. darGanadores(‘futbol’) y visualizar el resultado.
$darGanadores = $objTorneo->darGanadores("Futbol");
echo "------------GANADORES------------\n";
if ($darGanadores <> null){
    echo "Los ganadores son: \n" . $darGanadores ."\n";
}else{
    echo "¡ERROR!.\n";
}
    //f. calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
$calcularPremioPartido = $objTorneo->calcularPremioPartido($ingresarPartido1);
echo "---------PREMIO 1---------\n";
if ($calcularPremioPartido <> null){
    echo "Equipo ganador y premio: \n" . $calcularPremioPartido ."\n";
}else{
    echo "¡ERROR!.\n";
}

$calcularPremioPartido = $objTorneo->calcularPremioPartido($ingresarPartido2);
echo "---------PREMIO 2---------\n";
if ($calcularPremioPartido <> null){
    echo "Equipo ganador y premio: \n" . $calcularPremioPartido ."\n";
}else{
    echo "¡ERROR!.\n";
}

$calcularPremioPartido = $objTorneo->calcularPremioPartido($ingresarPartido3);
echo "---------PREMIO 3---------\n";
if ($calcularPremioPartido <> null){
    echo "Equipo ganador y premio: \n" . $calcularPremioPartido ."\n";
}else{
    echo "¡ERROR!.\n";
}


//4. Realizar un echo del objeto  Torneo creado en (1).
echo "---------TORNEO---------\n";
echo $objTorneo . "\n";

?>
