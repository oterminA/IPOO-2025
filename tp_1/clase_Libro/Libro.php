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
    public function getIsbn():int{
        return $this->isbn;
    }
    public function getTituloLibro():string{
        return $this->tituloLibro;
    }
    public function getAnioEdicionLibro():int{
        return $this->anioEdicionLibro;
    }
    public function getNombreEditorial():string{
        return $this->nombreEditorial;
    }
    public function getNombreAutor():string{
        return $this->nombreAutor;
    }
    public function getApellidoAutor():string{
        return $this->apellidoAutor;
    }

    //modificadoras set
    public function setIsbn($unIsbn):void{
        $this->isbn=$unIsbn;
    }
    public function setTituloLibro($titulo):void{
        $this->tituloLibro=$titulo;
    }
    public function setAnioEdicionLibro($anioEdicion):void{
        $this->anioEdicionLibro=$anioEdicion;
    }
    public function setNombreEditorial($editorial):void{
        $this->nombreEditorial=$editorial;
    }
    public function setNombreAutor($autor):void{
        $this->nombreAutor=$autor;
    }
    public function setApellidoAutor($apellido):void{
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
        $n = count($this->arregloDatosLibro());
        $i = 0;
        $pertenece = false; //no pertence
        while ($i<$n && $peditorial===$this->getNombreEditorial()){
            $pertenece = false;
            $i++;
        }
        return $pertenece;
    }

    /**
     * retorna los años que han pasado desde que el libro fue editado
    */
    public function aniosDesdeEdicion(){
        $anioActual = 2025;
        $this->setAnioEdicionLibro($anioActual - $this->getAnioEdicionLibro());
        return $this->getAnioEdicionLibro();
    }



    //redefinicion metodo __toString()
    public function __toString(){
        $mensaje = ">Titulo del libro: " . $this->getTituloLibro() . "\n" .
        ">Autor: " . $this->getNombreAutor() . " " . $this->getApellidoAutor()."\n" .
        ">Año edicion: " . $this->getAnioEdicionLibro() . "\n" .
        ">Editorial: " . $this->getNombreEditorial() . "\n" .
        ">Codigo ISBN del libro: " . $this->getIsbn() . "\n" ;
        return $mensaje;
    }


}

?>