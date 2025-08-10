<?php

class Libro
{
    //variables instancias
    private $isbn;
    private $tituloLibro;
    private $anioEdicionLibro;
    private $nombreEditorial;
    private $cantidadPaginas;
    private $sinopsisLibro;
    private $objetoAutor; //referencia a la clase Persona(nombre, apellido, doc, tipoDoc)

    //metodo constructor
    public function __construct($unIsbn, $titulo, $anioEdicion, $editorial, $paginas, $sinopsis, $objAutor)
    {
        $this->isbn             = $unIsbn;
        $this->tituloLibro      = $titulo;
        $this->anioEdicionLibro = $anioEdicion;
        $this->nombreEditorial  = $editorial;
        $this->cantidadPaginas  = $paginas;
        $this->sinopsisLibro    = $sinopsis;
        $this->objetoAutor      = $objAutor;
    }

    //observadoras get
    public function getIsbn()
    {
        return $this->isbn;
    }
    public function getTituloLibro()
    {
        return $this->tituloLibro;
    }
    public function getAnioEdicionLibro()
    {
        return $this->anioEdicionLibro;
    }
    public function getNombreEditorial()
    {
        return $this->nombreEditorial;
    }
    public function getCantidadPaginas()
    {
        return $this->cantidadPaginas;
    }
    public function getSinopsisLibro()
    {
        return $this->sinopsisLibro;
    }
    public function getObjetoAutor()
    {
        return $this->objetoAutor;
    }

    //modificadoras set
    public function setIsbn($unIsbn)
    {
        $this->isbn = $unIsbn;
    }
    public function setTituloLibro($titulo)
    {
        $this->tituloLibro = $titulo;
    }
    public function setAnioEdicionLibro($anioEdicion)
    {
        $this->anioEdicionLibro = $anioEdicion;
    }
    public function setNombreEditorial($editorial)
    {
        $this->nombreEditorial = $editorial;
    }
    public function setCantidadPaginas($paginas)
    {
        $this->cantidadPaginas = $paginas;
    }
    public function setSinopsisLibro($sinopsis)
    {
        $this->sinopsisLibro = $sinopsis;
    }
    public function settObjetoAutor($objAutor)
    {
        $this->objetoAutor = $objAutor;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = "Titulo del libro: " . $this->getTituloLibro() . "\n" .
        "Año edicion: " . $this->getAnioEdicionLibro() . "\n" .
        "Editorial: " . $this->getNombreEditorial() . "\n" .
        "Sinopsis: " . $this->getSinopsisLibro() . "\n" .
        "Cantidad de páginas: " . $this->getCantidadPaginas() . "\n" .
        "Autor " . $this->getObjetoAutor() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * hace un arreglo con los datos del libro
     * @return array
     */
    public function arregloDatosLibro()
    {
        $arregloLibro                    = [];
        $arregloLibro["isbn"]            = $this->getIsbn();
        $arregloLibro["tituloLibro"]     = $this->getTituloLibro();
        $arregloLibro["anioEdicion"]     = $this->getAnioEdicionLibro();
        $arregloLibro["nombreEditorial"] = $this->getNombreEditorial();
        $arregloLibro["cantidadPaginas"] = $this->getCantidadPaginas();
        $arregloLibro["sinopsisLibro"]   = $this->getSinopsisLibro();
        $arregloLibro["datosAutor"]      = $this->getObjetoAutor();
        return $arregloLibro;
    }

    /**
     * indica si el libro pertenece a una editorial dada
     * @param string $peditorial
     * @return boolean $pertenece
     */
    public function perteneceEditorial($peditorial)
    {
        $n         = count($this->arregloDatosLibro());
        $i         = 0;
        $pertenece = false; //no pertence
        while ($i < $n && $peditorial === $this->getNombreEditorial()) {
            $pertenece = true; //pertenece
            $i++;
        }
        return $pertenece;
    }

    /**
     * retorna los años que han pasado desde que el libro fue editado
     */
    public function aniosDesdeEdicion()
    {
        $anioActual = 2025;
        $this->setAnioEdicionLibro($anioActual - $this->getAnioEdicionLibro());
        return $this->getAnioEdicionLibro();
    }
}
