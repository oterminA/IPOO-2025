<?php
class Lectura{
    //atributos (variables instancia)
    private $paginaActual;
    private $objetoLibro; //referencia a clase Libro (isbn, titulo, editorial, año edicion, objAutor(nombre, apellido, doc y tipoDoc), cantPaginas, sinopsis) 

    //metodo constructor
    public function __construct($pagina, $objLibro)
    {
        $this->paginaActual=$pagina;
        $this->objetoLibro=$objLibro;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPaginaActual(){
        return $this->paginaActual;
    }
    public function getObjetoLibro(){
        return $this->objetoLibro;
    }

    //set
    public function setPaginaActual($pagina){
        $this->paginaActual=$pagina;
    }
    public function setObjetoLibro($objLibro){
        $this->objetoLibro=$objLibro;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Numero de pagina actual: " . $this->getPaginaActual() . "\n" .
        "Datos libro---\n" . $this->getObjetoLibro() . "\n" ;
        return $mensaje;
    }

    //metodos nuevos
    /**
     *  método que retorna la página del libro y actualiza la variable que contiene la pagina actual.
    */
    public function siguientePagina(){
        $objLibro = $this->getObjetoLibro();
        $siguiente = -1;//en caso de que no se pueda pasar
        $actual = $this->getPaginaActual(); //ejemplo 5
        $sig = $actual+1; // ejemplo 5+1=6

        $pagsTotales = $objLibro->getCantidadPaginas(); //ASI SI SE GUARDAN LAS PAGINAS TOTALES!!!! ASI SE ACCEDE 
        if ($sig >=1 && $sig <= $pagsTotales){
            $this->setPaginaActual($sig); // !!!!!!!!!!!!
            $siguiente = $this->getPaginaActual(); //o sea que se haria la operacion y pasaria a la pag sgte
        }
        return $siguiente;
    }

    /**
    *  método que retorna la página anterior a la actual del libro y actualiza su valor.
    */
    public function retrocederPagina(){    
        $objLibro = $this->getObjetoLibro();
        $anterior = -1;//en caso de que no se pueda volver
        $actual = $this->getPaginaActual();
        $ant = $actual-1;
        $pagsTotales = $objLibro->getCantidadPaginas(); //ASI SI SE GUARDAN LAS PAGINAS TOTALES!!!! ASI SE ACCEDE 

        if ($ant >=1 && $ant <= $pagsTotales){
           $this->setPaginaActual($ant); //o sea que se haria la operacion y retrocederia
           $anterior = $this->getPaginaActual(); ///!!!!!!!!!!
        }
        return $anterior;
    }

    /**
     * método que retorna la página actual y setea como página actual al valor recibido por parámetro.
    */
    public function irPagina($nroPagina){
        $objLibro = $this->getObjetoLibro();
        $actual = -1; //negativo por defecto
        $pagsTotales = $objLibro->getCantidadPaginas(); //ASI SI SE GUARDAN LAS PAGINAS TOTALES!!!! ASI SE ACCEDE 

        if(($nroPagina <= $pagsTotales) && ($nroPagina >0)){
            $this->setPaginaActual($nroPagina);
            $actual = $this->getPaginaActual();
        }
        return $actual;
    }
}
?>