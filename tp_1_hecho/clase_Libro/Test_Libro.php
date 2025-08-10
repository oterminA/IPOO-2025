<?php
include_once 'Libro.php';

//****************************************//
//Por si el usuario ingresa los datos:
// echo ">Ingrese el codigo ISBN del libro:\n";
// $codigoIsbn = trim(fgets(STDIN));
// echo ">Ingrese el titulo del libro:\n";
// $tituloLibro = trim(fgets(STDIN));
// echo ">Ingrese el año de edicion:\n";
// $anioEdicion = trim(fgets(STDIN));
// echo ">Ingrese el nombre de la editorial:\n";
// $nombreEditorial = trim(fgets(STDIN));
// echo ">Ingrese el nombre del autor:\n";
// $autor = trim(fgets(STDIN));
// echo ">Ingrese el apellido del autor:\n";
// $apellido = trim(fgets(STDIN));
//****************************************//

//objetos Libro con los datos previamente escritos
$libro1 = new Libro("09187", "Percy Jackson: el ladron del rayo", "2023", "Planeta", "Rick", "Riordan");
$libro2 = new Libro("98765", "Cartas Cruzadas", "2012", "Planeta", "Marcus", "Zuzak");
$libro3 = new Libro("54329", "Martin Fierro", "2008", "Imprenta de la Pampa", "José", "Hernandez");

//arreglo solo con titulos de libros
$parreglo = [];
$parreglo[0] = "Percy Jackson: el ladrón del rayo";
$parreglo[1] = "La Ladrona de Libros";
$parreglo[2] = "Los Juegos del Hambre";
$parreglo[3] = "Cartas Cruzadas";
$parreglo[4] = "Temblor";
$parreglo[5] = "Caos";
$parreglo[6] = "Martin Fierro";

//arreglo multidimensional? con los objetos libro
$arregloLibros = [];
$arregloLibros[0] = $libro1;
$arregloLibros[1] = $libro2;
$arregloLibros[2] = $libro3;


//toString en el test
echo $libro1 . "\n";
echo $libro2 . "\n";
echo $libro3 . "\n";

echo ">Años desde edición del libro 1: " . $libro1->aniosDesdeEdicion() . " años\n";
echo ">Años desde edición del libro 2: " . $libro2->aniosDesdeEdicion() . " años\n";
echo ">Años desde edición del libro 3: " . $libro3->aniosDesdeEdicion() . " años\n";



//metodo iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por parámetro ya se encuentra en dicha colección.
function iguales($plibro, $parreglo){
    $encontrado = false;
    $i = 0;
    while ($i < count($parreglo) && !$encontrado){
        $libro = $parreglo[$i];
        if ($libro->getIsbn() == $plibro->getIsbn()) {
            $encontrado = true;
        }
        $i++;
    }

    if ($encontrado) {
        echo "\n>El libro se encuentra en la colección.\n";
    } else {
        echo ">El libro NO se encuentra en la colección.\n";
    }
}

//defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo con todos los libros publicados por la editorial dada

function librodeEditoriales($arregloLibros, $peditorial){
    $cantidad = count(($arregloLibros));
    $i = 0;
    $librosEditorial = [];
    while (($i<$cantidad)){
        $libro = $arregloLibros[$i];
        $editorialLibro = $libro->getNombreEditorial();
        if ($editorialLibro == $peditorial){
            array_push($librosEditorial, $libro);
        }
        $i++;
    }
    return $librosEditorial; //retorna el arreglo con algun libro o vacio
}
$peditorial = "Planeta"; //segun esto, el arreglo resultante deberia tener dos titulos, los del libro1 y libro2
$arregloEditorial = librodeEditoriales($arregloLibros, $peditorial);
echo "\n>Los libros publicados por la editorial '$peditorial' son:\n";
foreach ($arregloEditorial as $libro) {
    echo $libro . "\n";
}
