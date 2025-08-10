<?php
class Lectura{
    //atributos (variables instancia)
    private $arrayLibrosLeidos; //referencia a clase Libro (isbn, titulo, editorial, año edicion, objAutor(nombre, apellido, doc y tipoDoc), cantPaginas, sinopsis) 

    //metodo constructor
    public function __construct($arrayLibrosLeidos)
    {
        $this->arrayLibrosLeidos=$arrayLibrosLeidos;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getarrayLibrosLeidos(){
        return $this->arrayLibrosLeidos;
    }

    //set
    public function setarrayLibrosLeidos($arrayLibrosLeidos){
        $this->arrayLibrosLeidos=$arrayLibrosLeidos;
    }

    /**
     * function para poder recorrer el arreglo
    */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if($cantidadArreglo == 0){
            $mensaje = "Arreglo sin elementos. \n";
        }else{
            for($i=0; $i<$cantidadArreglo; $i++){
                $mensaje = $mensaje . "Libro N°". $i+1 . ": ". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Coleccion de libros leidos---\n" . $this->recorrerLosArreglos($this->getarrayLibrosLeidos())  . "\n" ;
        return $mensaje;
    }

    //metodos nuevos
    /**
     * retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del conjunto de libros leídos y false en caso contrario.
    */
    public function libroLeido($titulo){
        $coleccionLibros = $this->getarrayLibrosLeidos(); //tomo la coleccion de libros
        $cantidad = count($coleccionLibros); //saco la cantidad de libros dentro del array
        $i=0; //contador
        $encontrado = false; //bandera

        while(($i<$cantidad) && !$encontrado){
            $objLibro = $coleccionLibros[$i]; //recupero un obj libro del array
            $tituloObjLibro = $objLibro->getTituloLibro(); //recupero el titulo de ese obj libro
            if ($titulo === $tituloObjLibro){
                $encontrado=true; //cambio la bandera
            }
            $i++;
        }
        return $encontrado; //retorno un boolean true si se encontró el titulo ese o false si no
    }

    /**
     * retorna la sinopsis del libro cuyo título se recibe por parámetro.
    */
    public function darSinopsis($titulo){
        //creo q podria haber usado la funcion de arriba para buscar el libro y si está en el array, ahi busco la sinopsis pero igual voy a tener que hacer la estructura repetitiva para encontrar esa sinopsis xq la funcion anterior solo devuelve un booleano, no el libro, entonces siento que seria mucha repeticion de codigo
        $coleccionLibros = $this->getarrayLibrosLeidos(); //tomo la coleccion de libros
        $cantidad = count($coleccionLibros); //saco la cantidad de libros dentro del array
        $i=0; //contador
        $encontrado = false; //bandera
        $sinopsisLibro = null;

        while(($i<$cantidad) && !$encontrado){
            $objLibro = $coleccionLibros[$i]; //recupero un obj libro del array
            $tituloObjLibro = $objLibro->getTituloLibro(); //recupero el titulo de ese obj libro
            if ($titulo === $tituloObjLibro){
                $encontrado=true; //cambio la bandera
                $sinopsisLibro = $objLibro->getSinopsisLibro();
            }
            $i++;
        }
        return $sinopsisLibro; //retorno la sinopsis
    }

    /**
     * metodo que retorna todos aquellos libros que fueron leídos y su año de edición es un año X recibido por parámetro.
    */
    public function leidosAnioEdicion($x){
        //recorro el arreglo y por cada obj libro chequeo la fecha, si coincide, guardo ese libro en un array nuevo
        $coleccionLibros = $this->getarrayLibrosLeidos(); //tomo la coleccion de libros
        $librosDeTalFecha = []; //array vacio

        //acá hago un recorrido exhaustivo porque no es q cuando encuentre el libro que coincida se termina la busqueda, sino que todos los libros que sean de ese año, son los que tengo que guardar
        foreach ($coleccionLibros as $objLibro) {
            $fechaLibro = $objLibro->getAnioEdicionLibro();
            if ($fechaLibro == $x){
                array_push($librosDeTalFecha, $objLibro); //agrego ese libro al array de libros de esa fecha
            }
        }
        return $librosDeTalFecha; //devuelve un arreglo vacio o con al menos un libro
    }

    /**
     *  retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro
    */
    public function darLibrosPorAutor($nombreAutor){
        //acá tengo que ir: arrayLibros-> objLibro(clase libro)->objAutor(clase persona)-> nombre
        $coleccionLibros = $this->getarrayLibrosLeidos(); //tomo la coleccion de libros
        $librosPorAutor = []; //array vacio

        //acá hago un recorrido exhaustivo porque no es q cuando encuentre el libro que coincida se termina la busqueda, sino que todos los libros que sean de ese autor, son los que tengo que guardar
        foreach ($coleccionLibros as $objLibro) {
            $objAutor = $objLibro->getObjetoAutor(); //recupero la referencia a la clase persona q está en la clase libro
            $nombrePersona = $objAutor->getNombreApellido(); //recupero el nombre del autor desde la clase persona
            if ($nombreAutor === $nombrePersona){
                array_push($librosPorAutor, $objLibro); //agrego ese libro al array del autor
            }
        }
        return $librosPorAutor; //devuelve un arreglo vacio o con al menos un libro
    } 

}

