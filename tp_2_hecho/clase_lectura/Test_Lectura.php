<?php
include_once 'Libro.php';
include_once 'Persona.php';
include_once 'Lectura.php';

//
$objAutor1 = new Persona("Jorge Luis", "Borges", "DNI", 12951753);
$objLibro1 = new Libro(58884, "Emma Zunz", 1948, "DeBolsillo", 15, "Es un cuento que narra la historia de una joven que, tras la muerte de su padre, decide vengar la que cree era una injusticia cometida en su contra", $objAutor1);
$objLectura1 = new Lectura(5, $objLibro1);


//
echo $objLectura1 . "\n";

//
$paginaActual = $objLectura1->getPaginaActual();
echo "-------------- \n La pagina actual es la numero " . $paginaActual . "\n";

//
$siguientePag = $objLectura1->siguientePagina();
if ($siguientePag ==- 1){
    echo "-------------- \n No se pudo pasar de página. Se terminó el libro.\n";
}else{
    echo "-------------- \n La pagina siguiente es la numero " . $siguientePag . "\n"; //ASI SE BUSCAN LOS DATOS!!!!!!!
}



$anteriorPag = $objLectura1->retrocederPagina();
if ($anteriorPag == -1){
    echo "-------------- \n No se pudo volver la página. Es el comienzo del libro.\n";
}else{
    echo "-------------- \n La pagina anterior es la numero " . $anteriorPag . "\n";
}


$pagina = 14;
$visitarPag = $objLectura1->irPagina($pagina);
if ($visitarPag == -1){
    echo "-------------- \n No se pudo ir a la pagina solicitada. \n";
}else{
    echo "-------------- \n Ahora la pagina actual es la numero " . $visitarPag . "\n";
}

?>