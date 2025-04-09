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
$libro2 = new Libro("98765", "Cartas Cruzadas", "2012", "De Bolsillo", "Marcus", "Zuzak");
$libro3 = new Libro("54329", "Martin Fierro", "2008", "Imprenta de la Pampa", "José", "Hernandez");
$libro4 = new Libro("72816", "Percy Jackson: el hijo de Neptuno", "2014", "Planeta", "Rick", "Riordan");

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
$arregloLibros[3] = $libro4;


//toString en el test
echo $libro1 . "\n";
echo $libro2 . "\n";
echo $libro3 . "\n";
echo $libro4 . "\n";


//prueba de la funcion aniosDesdeEdicion
echo ">Pasaron " . $libro2->aniosDesdeEdicion() . " años desde la edición de " . $libro2->getTituloLibro() . " del autor " . $libro2->getNombreAutor() . " " . $libro2->getApellidoAutor() . ".\n";


//prueba de la funcion iguales
echo ">Ingrese un libro a encontrar: ";
$plibro = trim(fgets(STDIN));
/**
 * indica si el libro del parametro ya se encuentra en el arreglo
 * @param string $plibro
 * @param array $parreglo
 */
function iguales($plibro, $parreglo)
{

    $n = count($parreglo);
    $i = 0;
    $encontrado = false; //no se encuentra
    while ($i < $n && strtolower($plibro) === strtolower($parreglo[$i])) {
        $encontrado = true; //se encontró
        $i++;
    }
    return $encontrado;
}
$libroEncontrado = iguales($plibro, $parreglo);
if ($libroEncontrado){
    echo ">Se encontró el libro.\n";
}else{
    echo ">El libro no fue encontrado.\n";
}



//prueba de la funcion libroDeEditoriales que usa el metodo perteneceEditorial
echo ">Ingrese una editorial: ";
$peditorial = trim(fgets(STDIN));
/**
 * retorna un arreglo asociativo con todos los libros publicados por una editorial en especifico
 * 
*/
function libroDeEditoriales($arregloLibros, $peditorial){
    $librosEditorial = [];
    foreach ($arregloLibros as $libro) {
        if ($libro->perteneceEditorial($peditorial)) {
            $librosEditorial[] = $libro;
        }
    }
    return $librosEditorial;
}
// $mostrarLibros = libroDeEditoriales($arregloLibros, $peditorial);
echo "Los libros que pertenecen a esa editorial son: " . print(libroDeEditoriales($arregloLibros, $peditorial)); 