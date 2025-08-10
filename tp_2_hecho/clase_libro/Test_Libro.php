<?php
include_once 'Persona.php';
include_once 'Libro.php';

$objAutor1 = new Persona("Mariana", "Enriquez", "DNI", 18675432);

$objLibro1 = new Libro(1235, "Las Cosas que Perdimos en el Fuego", 2016, "Anagrama", 243,
    "La obra cuenta con 12 relatos enmarcados en el género del terror, en los que Enríquez explora temáticas sociales como la depresión, la pobreza, los desórdenes alimenticios, la desigualdad y la violencia de género.",
    $objAutor1);

echo $objLibro1 . "\n";

echo ">Años desde edición del libro: " . $objLibro1->aniosDesdeEdicion() . " años\n";

$arregloLibros = [];
$arregloLibros[] = $objLibro1;


function librodeEditoriales($arregloLibros, $peditorial){
    $librosEditorial = [];
    foreach ($arregloLibros as $libro) {
        if ($libro->getNombreEditorial() == $peditorial) {
            $librosEditorial[] = $libro;
        }
    }
    return $librosEditorial;
}

$peditorial = "Anagrama";
$arregloEditorial = librodeEditoriales($arregloLibros, $peditorial);

echo "\n>Los libros publicados por la editorial '$peditorial' son:\n";
foreach ($arregloEditorial as $libro) {
    echo $libro . "\n";
}

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
