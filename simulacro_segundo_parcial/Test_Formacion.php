<?php
include_once 'Locomotora.php';
include_once 'Vagon.php';
include_once 'Vagon_Pasajeros.php';
include_once 'Vagon_Carga.php';
include_once 'Formacion.php';

// 1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.
//1 ton = 1000kg
$objLocomotora = new Locomotora(188000, 140);

// 2. Se crea 3 objetos con la información visualizada en la tabla:
// Vagon de pasajeros 1: peso vacío 15000, máx 30 pasajeros, 25 actuales
$objVagon1 = new Vagon_Pasajeros(2013, 20, 3, 15000, 30);
$objVagon1->setCantidadPasajerosTransporta(25); //acá seteo la cantidad de gente actual en el vagon, porque ese parametro no entra en el constructor

// Vagon de carga: peso vacío 15000, carga actual 55000
$objVagonCarga = new Vagon_Carga(2000, 20, 3, 15000, 60000, 55000);

// Vagon de pasajeros 2: peso vacío 15000, máx 50 pasajeros, 50 actuales
$objVagon2 = new Vagon_Pasajeros(2024, 20, 3, 15000, 50);
$objVagon2->setCantidadPasajerosTransporta(50);//acá seteo la cantidad de gente actual en el vagon, porque ese parametro no entra en el constructor


// 3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método incorporarVagonFormacion
$objFormacion = new Formacion($objLocomotora, [$objVagon1, $objVagonCarga, $objVagon2], 5); ///???
$objFormacion->incorporarVagonFormacion($objVagon1);
$objFormacion->incorporarVagonFormacion($objVagonCarga);
$objFormacion->incorporarVagonFormacion($objVagon2);

// 4. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y visualizar el resultado
echo "Incorporacion de 6 pasajeros: \n";
$resultado = $objFormacion->incorporarPasajeroFormacion(6);
echo $resultado ? "Sucedió la incorporación. \n" : "Falló la incorporación. \n"; //uso una ternaria en lugar del if

// 5. Realizar un print de los 3 objetos vagones creados
echo "Vagón de pasajeros 1----\n ". $objVagon1 ."\n";
echo "Vagón de carga----\n " . $objVagonCarga . "\n";
echo "Vagón de pasajeros 2----\n " . $objVagon2 . "\n";

// 6. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y visualizar el resultado
echo "Incorporacion de pasajeros: \n";
$resultado = $objFormacion->incorporarPasajeroFormacion(14);
echo $resultado ? "Sucedió la incorporación. \n" : "Falló la incorporación. \n";

// 7. Realizar un print del objeto locomotora
echo "Locomotora----\n" . $objLocomotora . "\n";

// 8. Invocar al método promedioPasajeroFormacion y visualizar el resultado obtenido.
$promedio = $objFormacion->promedioPasajeroFormacion();
echo "Promedio de pasajeros por vagón: " . round($promedio,2) . "\n";

// 9.  Invocar al método pesoFormacion y visualizar el resultado obtenido.
$pesoTotal = $objFormacion->pesoFormacion();
echo "Peso total de la formación: " . $pesoTotal . "kg\n";

// 10. Realizar un print de los 3 objetos vagones creados
echo "Vagón de pasajeros 1----\n ". $objVagon1 ."\n";
echo "Vagón de carga----\n " . $objVagonCarga . "\n";
echo "Vagón de pasajeros 2----\n " . $objVagon2 . "\n";
?>
