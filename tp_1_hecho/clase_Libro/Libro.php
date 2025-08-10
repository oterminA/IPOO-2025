<?php

class Libro {
    //variables instancias
    private $isbn;
    private $tituloLibro;
    private $anioEdicionLibro;
    private $nombreEditorial;
    private $nombreAutor;
    private $apellidoAutor;

    //metodo constructor
    public function __construct($unIsbn, $titulo, $anioEdicion, $editorial, $autor, $apellido){
        $this->isbn = $unIsbn;
        $this->tituloLibro = $titulo;
        $this->anioEdicionLibro = $anioEdicion;
        $this->nombreEditorial = $editorial;
        $this->nombreAutor = $autor;
        $this->apellidoAutor = $apellido;
    }

    //observadoras get
    public function getIsbn(){
        return $this->isbn;
    }
    public function getTituloLibro(){
        return $this->tituloLibro;
    }
    public function getAnioEdicionLibro(){
        return $this->anioEdicionLibro;
    }
    public function getNombreEditorial(){
        return $this->nombreEditorial;
    }
    public function getNombreAutor(){
        return $this->nombreAutor;
    }
    public function getApellidoAutor(){
        return $this->apellidoAutor;
    }

    //modificadoras set
    public function setIsbn($unIsbn){
        $this->isbn=$unIsbn;
    }
    public function setTituloLibro($titulo){
        $this->tituloLibro=$titulo;
    }
    public function setAnioEdicionLibro($anioEdicion){
        $this->anioEdicionLibro=$anioEdicion;
    }
    public function setNombreEditorial($editorial){
        $this->nombreEditorial=$editorial;
    }
    public function setNombreAutor($autor){
        $this->nombreAutor=$autor;
    }
    public function setApellidoAutor($apellido){
        $this->apellidoAutor=$apellido;
    }


    //metodos nuevos
    /**
     * hace un arreglo con los datos del libro
     * @return array
    */
    public function arregloDatosLibro(){
        $arregloLibro = [];
        $arregloLibro ["isbn"] = $this->getIsbn();
        $arregloLibro ["tituloLibro"] = $this->getTituloLibro();
        $arregloLibro ["anioEdicion"] = $this->getAnioEdicionLibro();
        $arregloLibro ["nombreEditorial"] = $this->getNombreEditorial();
        $arregloLibro ["nombreAutor"] = $this->getNombreAutor();
        $arregloLibro ["apellidoAutor"] = $this->getApellidoAutor();
        return $arregloLibro;
    }

    /**
     * indica si el libro pertenece a una editorial dada
     * @param string $peditorial
     * @return boolean $pertenece
    */
    public function perteneceEditorial($peditorial){
        $pertenece = false; //no pertence
        $editorialLibro = $this->getNombreEditorial();
        if ($editorialLibro === $peditorial){
            $pertenece = true;
        }
        
        return $pertenece; //retorna un boolean true o false
    }

    /**
     * retorna los años que han pasado desde que el libro fue editado
    */
    public function aniosDesdeEdicion(){
        $anioActual = 2025;
        $aniosPasaron= $anioActual - $this->getAnioEdicionLibro();
        return $aniosPasaron;
    }



    //redefinicion metodo __toString()
    public function __toString(){
        $mensaje = 
        ">Titulo del libro: " . $this->getTituloLibro() . "\n" .
        ">Autor: " . $this->getNombreAutor() . " " . $this->getApellidoAutor()."\n" .
        ">Año edicion: " . $this->getAnioEdicionLibro() . "\n" .
        ">Editorial: " . $this->getNombreEditorial() . "\n" .
        ">Codigo ISBN del libro: " . $this->getIsbn() . "\n" ;
        return $mensaje;
    }


}

?>