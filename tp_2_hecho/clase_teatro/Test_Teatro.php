<?php
include_once 'Teatro.php';
include_once 'Funcion.php';

///

echo ">Ingrese el nombre del teatro: ";
$nombreTeatro = trim(fgets(STDIN));

echo ">Ingrese la dirección del teatro: ";
$direccionTeatro = trim(fgets(STDIN));

$objFuncion1 = new Funcion("Hamlet", ["hora" => 15, "minutos" => 45], 2, 5000);
$objFuncion2 = new Funcion("Mujeres en oferta", ["hora" => 20, "minutos" => 15], 1.30, 8000);
$objFuncion3 = new Funcion("El lago de los cisnes", ["hora" => 20, "minutos" => 15], 2, 5900);
$objFuncion4 = new Funcion("Rocky I", ["hora" => 22, "minutos" => 20], 2.15, 7000);
$objFuncion5 = new Funcion("La casa de Bernarda Alba", ["hora" => 18, "minutos" => 30], 1.45, 6200);
$objFuncion6 = new Funcion("Sueño de una noche de verano", ["hora" => 17, "minutos" => 00], 2.10, 7500);
$objFuncion7 = new Funcion("Esperando la carroza", ["hora" => 21, "minutos" => 30], 1.30, 6800);
$objFuncion8 = new Funcion("El Principito", ["hora" => 16, "minutos" => 15], 1.20, 5000);
$objFuncion9 = new Funcion("El Rey León", ["hora" => 19, "minutos" => 00], 2.30, 9500);
$objFuncion10 = new Funcion("Don Quijote", ["hora" => 14, "minutos" => 45], 2.00, 7200);
$objFuncion11 = new Funcion("Cenicienta", ["hora" => 11, "minutos" => 30], 1.15, 4300);
$objFuncion12 = new Funcion("Los Productores", ["hora" => 20, "minutos" => 45], 2.00, 8100);


$teatro1 = new Teatro($nombreTeatro, $direccionTeatro, [$objFuncion1, $objFuncion2, $objFuncion3, $objFuncion4, $objFuncion5, $objFuncion6, $objFuncion7, $objFuncion8, $objFuncion9, $objFuncion10, $objFuncion11, $objFuncion12]);

///
echo "\n----------- DATOS DEL TEATRO -----------\n";
echo $teatro1;

///

echo ">Ingrese un nuevo nombre para el teatro: ";
$nuevoNombre = trim(fgets(STDIN));
$teatro1->cambiarNombreTeatro($nuevoNombre);

echo ">Ingrese una nueva dirección para el teatro: ";
$nuevaDireccion = trim(fgets(STDIN));
$teatro1->cambiarDireccionTeatro($nuevaDireccion);

echo ">Ingrese el nombre de la funcion que desea modificar: ";
$nombreFuncion = trim(fgets(STDIN));
echo ">Ingrese el precio y nombre nuevo: ";
$nombreNuevo = trim(fgets(STDIN));
$precioNuevo = trim(fgets(STDIN));
$cambio = $teatro1->cambiarFuncion($nombreFuncion, $nombreNuevo, $precioNuevo);
if ($cambio) {
    echo ">La modificacion fue exitosa.\n";
} else {
    echo ">Ocurrió un error con la modificación.\n";
}

echo ">Desea ingresar una nueva función? SI-NO \n";
$rta = strtoupper(trim(fgets(STDIN)));
if ($rta == "SI") {
    echo ">Ingrese nombre de la funcion, hora y minutos de inicio, duracion y precio.\n";
    $nombre = trim(fgets(STDIN));
    $hora = trim(fgets(STDIN));
    $minutos = trim(fgets(STDIN));
    $duracion = trim(fgets(STDIN));
    $precio = trim(fgets(STDIN));
    $horario = ["hora" => $hora, "minutos" => $minutos];
    $validarHorario = $teatro1->verificarHorario($horario);
    if ($validarHorario) {
        $nuevaFuncion = new Funcion($nombre, $horario, $duracion, $precio);
        $arregloFunciones = $teatro1->getArregloFunciones();
        array_push($arregloFunciones, $nuevaFuncion);
        $teatro1->setArregloFunciones($arregloFunciones);
        echo "> La nueva función fue añadida con éxito.\n";
    } else {
        echo "> El horario ya está ocupado por otra función.\n";
    }
} else {
    echo "> No se agregó una nueva función.\n";
}


//
echo "\n----------- DATOS ACTUALIZADOS DEL TEATRO -----------\n";
echo $teatro1;