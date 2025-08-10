<?php
class Actividad_Musical extends Actividad{
    //atributos (variables instancia)
    private $objdirector;
    private $cantPersonasEscena;

    //metodo constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio, $tipo, $objdirector, $cantPersonasEscena)
    {
        $this->objdirector=$objdirector;  
        $this->cantPersonasEscena=$cantPersonasEscena;   
        parent::__construct($nombre, $horarioInicio, $duracion, $precio, $tipo);
    }

    //metodos de accedo: getters  y setters
    //get
    public function getObjDirector(){
        return $this->objdirector;
    }
    public function getCantPersonasEscena(){
        return $this->cantPersonasEscena;
    }

    //set
    public function setObjDirector($objdirector){
        $this->objdirector=$objdirector;
    }
    public function setCantPersonasEscena($cantPersonasEscena){
        $this->cantPersonasEscena=$cantPersonasEscena;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() . "\n" . 
        "Director---\n " . $this->getObjDirector() . "\n". 
        "Cantidad de personas en escena: " . $this->getCantPersonasEscena() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método el cual determina según las actividades del teatro cuál debería ser el cobro obtenido. 
     * Para obtener el mismo, hay que tener en cuenta que se deben sumar los precios de cada tipo de actividad programada para un mes dado, y aplicar un incremento por actividad según se detalle: si es un musical: 12% 
    */
    public function darCostos(){
        //Para sumar un porcentaje a una cantidad, se multiplica la cantidad original por 1 más el porcentaje expresado como decimal.
        $costoPadre = parent::darCostos(); //por herencia recupero el resultado de la clase padre, que es el precio de base
        $porcentaje = 12 / 100; //calculo para tener el decimal
        $precioFinal = $costoPadre * (1+$porcentaje);
        return $precioFinal;
    }
}