<?php
include_once 'Libro.php';
include_once 'Lectura.php';
include_once 'Persona.php';

//hago los obj autor
$objAutor1 = new Persona("Stephen Chbosky", "DNI", 14698452);
$objAutor2 = new Persona("Agatha Christie", "DNI", 9587412);
$objAutor3 = new Persona("Rainbow Rowell", "DNI", 18365214);
$objAutor4 = new Persona("Carlos Ruiz Zafón", "DNI", 20573951);
$objAutor5 = new Persona("Gabriel García Márquez", "DNI", 6654123);
$objAutor6 = new Persona("Suzanne Collins", "DNI", 30852963);

//hago los obj libro
$objLibro1 = new Libro(1478,"Las ventajas de ser invisible", 1999, "Planeta", 245, "Charlie, académicamente precoz y socialmente torpe, es un marginado que se limita a observar sin participar, hasta que un par de estudiantes de último curso lo acogen bajo su ala.", $objAutor1);
$objLibro2 = new Libro(5784, "Muerte en el nilo", 1937, "DeBolsillo", 210, "El detective Hercule Poirot investiga el asesinato de una rica y joven heredera a bordo del mismo crucero por el río Nilo en el que pasa las vacaciones Poirot.", $objAutor2);
$objLibro3 = new Libro(6022, "Eleanor y Park", 2012, "Colabo Libros", 325, "
Eleanor, una chica regordeta de 16 años con cabello rojo y rizado, y Park, un chico coreano birracial de 16 años, se conocen en un autobús escolar el primer día de Eleanor en el colegio y conectan gradualmente a través de cómics y mixtapes de música de los 80, lo que da origen a una historia de amor.", $objAutor3);
$objLibro4 = new Libro(8341, "La sombra del viento", 2001, "Planeta", 565, "En la Barcelona de la posguerra, Daniel descubre un libro olvidado que lo lleva a desentrañar el misterio de su autor, Julián Carax, cuyas obras están siendo destruidas por alguien.", $objAutor4);
$objLibro5 = new Libro(7190, "Cien años de soledad", 1967, "Sudamericana", 471, 
"La historia de la familia Buendía en el mítico pueblo de Macondo, un relato épico lleno de realismo mágico, soledad y destino.", $objAutor5);
$objLibro6 = new Libro(4553, "Los juegos del hambre", 2008, "Scholastic Press", 374, 
"Katniss Everdeen se ofrece como voluntaria para participar en una competencia mortal televisada, en un futuro distópico donde el poder se impone por el miedo.", $objAutor6);
$objLibro7 = new Libro(9112, "En llamas", 2012, "Secker & Warburg", 328, 
"Katniss Everdeen volvió a casa a salvo después de ganar la 74 edición de los Juegos del Hambre con su compañero Peeta. Sin embargo, ahora el Capitolio les obliga a abandonar de nuevo a su familia y amigos para participar en el Tour de la Victoria por todos los distritos. Mientras, el presidente Snow está preparando una nueva edición de los Juegos, que transformarán Panem para siempre.", $objAutor6);


//hago el obj lectura
$objLectura = new Lectura([$objLibro1, $objLibro2, $objLibro3, $objLibro4, $objLibro5, $objLibro6, $objLibro7]);

echo "\n >Coleccion de libros leidos----\n" . $objLectura;

echo "\n >Chequear libro leído: ";
$libro = trim(fgets(STDIN));
$leido = $objLectura->libroLeido($libro);
if ($leido){
    echo "El libro '" . $libro . "' se encuentra en la coleccion de libros leidos.\n";
}else{
    echo "El libro '" . $libro . "' NO se encuentra en la coleccion de libros leidos.\n";
}


echo "\n >Devolver la sinopsis de un libro: ";
$libro = trim(fgets(STDIN));
$sinopsis = $objLectura->darSinopsis($libro);
if ($sinopsis !== null){
    echo "La sinopsis de '" . $libro . "' es: " . $sinopsis . "\n";
}else{
    echo "Error. No hay sinopsis para ese libro.\n";
}


echo "\n>Ingrese el año de libros leidos que desea ver: ";
$anio = trim(fgets(STDIN));
$librosXAnio = $objLectura->leidosAnioEdicion($anio);
if ($librosXAnio === []){
    echo "No hay libros leidos para ese año.\n";
}else{
    echo "Los libros leidos de ese año de publicacion son: \n";
    foreach ($librosXAnio as $unLibro) {
        echo $unLibro . "\n";
    }
}


echo "\n>Autor cuyos libros quiere ver: ";
$autor = trim(fgets(STDIN));
$librosXAutor = $objLectura->darLibrosPorAutor($autor);
if ($librosXAutor === []){
    echo "No hay libros leidos para ese autor.\n";
}else{
    echo "Los libros de " . $autor . " son: \n";
    foreach ($librosXAutor as $unLibro) {
        echo $unLibro . "\n";
    }
}
