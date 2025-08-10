<?php

class Libro {
    //variables instancias
    private $isbn;
    private $tituloLibro;
    private $anioEdicionLibro;
    private $nombreEditorial;
    private $cantidadPags;
    private $sinopsis;
    private $objetoAutor;

    //metodo constructor
    public function __construct($unIsbn,  $titulo, $anioEdicion, $editorial, $cantidadPags, $sinopsis, $objetoAutor){
        $this->isbn = $unIsbn;
        $this->tituloLibro = $titulo;
        $this->anioEdicionLibro = $anioEdicion;
        $this->nombreEditorial = $editorial;
        $this->cantidadPags = $cantidadPags;
        $this->sinopsis = $sinopsis;
        $this->objetoAutor = $objetoAutor;

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
    public function getCantidadPaginas(){
        return $this->cantidadPags;
    }
    public function getSinopsis(){
        return $this->sinopsis;
    }
    public function getObjetoAutor(){
        return $this->objetoAutor;
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
    public function setCantidadPaginas($cantidadPags){
        $this->cantidadPags=$cantidadPags;
    }
    public function setSinopsis($sinopsis){
        $this->sinopsis=$sinopsis;
    }
    public function setObjetoAutor($objetoAutor){
        $this->objetoAutor=$objetoAutor;
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
        $arregloLibro ["cantidadPaginas"] = $this->getCantidadPaginas();
        $arregloLibro ["sinopsis"] = $this->getSinopsis();
        $arregloLibro ["autor"] = $this->getObjetoAutor();
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
        ">Año edicion: " . $this->getAnioEdicionLibro() . "\n" .
        ">Editorial: " . $this->getNombreEditorial() . "\n" .
        ">Cantidad de paginas: " . $this->getCantidadPaginas() . "\n" .
        ">Sinopsis: " . $this->getSinopsis() . "\n" .
        ">Datos del autor----\n" . $this->getObjetoAutor() . "\n" .
        ">Codigo ISBN del libro: " . $this->getIsbn() . "\n" ;
        return $mensaje;
    }


}

?>