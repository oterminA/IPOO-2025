<?php
include_once 'Teatro.php';
include_once 'Actividad.php';
include_once 'Actividad_Musical.php';
include_once 'Actividad_Cine.php';
include_once 'Actividad_Teatro.php';

///

echo ">Ingrese el nombre del teatro: ";
$nombreTeatro = trim(fgets(STDIN));

echo ">Ingrese la dirección del teatro: ";
$direccionTeatro = trim(fgets(STDIN));

$objFuncion1 = new Actividad_Teatro("Hamlet", ["hora" => 15, "minutos" => 45], 2, 5000, "TEATRO");
$objFuncion2 = new Actividad_Teatro("Mujeres en oferta", ["hora" => 20, "minutos" => 15], 1.30, 8000, "TEATRO");
$objFuncion4 = new Actividad_Cine("Rocky I", ["hora" => 22, "minutos" => 20], 2.15, 7000, "CINE", "Ficcion", "USA");
$objFuncion6 = new Actividad_Musical("Sueño de una noche de verano", ["hora" => 17, "minutos" => 00], 2.10, 7500, "MUSICAL", "Shakespeare",50);
$objFuncion7 = new Actividad_Musical("Esperando la carroza", ["hora" => 21, "minutos" => 30], 1.30, 6800, "MUSICAL", "Pepe", 20);
$objFuncion9 = new Actividad_Cine("El Rey León", ["hora" => 19, "minutos" => 00], 2.30, 9500, "CINE", "Infantil", "USA");
$objFuncion11 = new Actividad_Cine("Cenicienta", ["hora" => 11, "minutos" => 30], 1.15, 4300, "CINE", "Infantil", "USA");


$teatro1 = new Teatro($nombreTeatro, $direccionTeatro, [$objFuncion1, $objFuncion2, $objFuncion4, $objFuncion6, $objFuncion7, $objFuncion9, $objFuncion11]);

///
echo "\n----------- DATOS ACTIVIDADES DEL TEATRO " . $nombreTeatro ." -----------\n";
echo $teatro1;

///

echo ">Ingrese un nuevo nombre para el teatro: ";
$nuevoNombre = trim(fgets(STDIN));
$teatro1->cambiarNombreTeatro($nuevoNombre);

echo ">Ingrese una nueva dirección para el teatro: ";
$nuevaDireccion = trim(fgets(STDIN));
$teatro1->cambiarDireccionTeatro($nuevaDireccion);



echo ">Desea ingresar un nuevo evento al teatro? SI-NO \n";
$rta = strtoupper(trim(fgets(STDIN)));
if ($rta == "SI") {
    echo ">Ingrese nombre de la funcion, hora y minutos de inicio, duracion, precio y tipo de actividad.\n";
    $nombre = strtolower(trim(fgets(STDIN)));
    $hora = strtolower(trim(fgets(STDIN)));
    $minutos = strtolower(trim(fgets(STDIN)));
    $duracion = strtolower(trim(fgets(STDIN)));
    $precio = strtolower(trim(fgets(STDIN)));
    $tipo = strtolower(trim(fgets(STDIN)));
    $horario = ["hora" => $hora, "minutos" => $minutos];
    $validarHorario = $teatro1->verificarHorario($horario);
    if ($validarHorario) {
        switch ($tipo) {
            case 'cine':
                echo ">Ingrese genero de la pelicula y país de origen:\n";
                $genero = strtolower(trim(fgets(STDIN)));
                $pais =strtoupper(trim(fgets(STDIN)));
                $nueva = new Actividad_Cine($nombre, $horario, $duracion, $precio, $tipo, $genero, $pais);
                break;
            case 'teatro':
                $nueva = new Actividad_Teatro($nombre, $horario, $duracion, $precio, $tipo);
                break;    
            case 'musical':
                echo ">Ingrese el nombre del director y la cantidad de personas en escena:\n";
                $director = strtolower(trim(fgets(STDIN)));
                $personas =strtolower(trim(fgets(STDIN)));
                $nueva = new Actividad_Cine($nombre, $horario, $duracion, $precio, $tipo, $director, $personas);       
        }
        $arregloActividades = $teatro1->getArregloActividades();
        array_push($arregloActividades, $nueva);
        $teatro1->setArregloActividades($arregloActividades);
        echo "> El nuevo evento fue añadida con éxito.\n";
    } else {
        echo "> El horario ya está ocupado por otra función.\n";
    }
} else {
    echo "> No se agregó una nueva función.\n";
}

echo "\n-----COSTOS-----\n";
echo "\n >Costo base para uso del teatro: \n";
$costo = trim(fgets(STDIN));

$costoCine = $objFuncion9->darCostos();
echo ">El costo para el cine es de $" . $costoCine . "\n";
$costoTeatro = $objFuncion2->darCostos();
echo ">El costo para el teatro es de $" . $costoTeatro . "\n";
$costoMusical = $objFuncion6->darCostos();
echo ">El costo para el musical es de $" . $costoMusical . "\n";
$costoTotal = $teatro1->darCostos();
echo ">Costo total por uso del teatro: $" . $costoTotal . "\n";



//
echo "\n----------- DATOS ACTIVIDADES ACTUALIZADAS DEL TEATRO " . $nuevoNombre . " -----------\n";
echo $teatro1;