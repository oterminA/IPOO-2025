<?php
class RegistrosEscolares extends RegistrosVehiculo{

    //atributos (variables instancia)
    private $capacidadMaxima;

    //metodo constructor
    public function __construct($nroPatente, $capacidadMaxima)
    {
        $this->capacidadMaxima=$capacidadMaxima;   
    parent::__construct($nroPatente);
    }

    //metodos de accedo: getters  y setters
    //get
    public function getCapacidadMaxima(){
        return $this->capacidadMaxima;
    }

    //set
    public function setCapacidadMaxima($capacidadMaxima){
        $this->capacidadMaxima=$capacidadMaxima;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() . "\n" .
        "Capacidad maxima: " . $this->getCapacidadMaxima() . "kg\n";

        return $mensaje;
    }


    //metodos nuevos
        /**
     * el método que calcula y retorna el valor final a pagar por un vehículo. Redefinir según corresponda, indicando la clase en la que se debe encontrar el método y detallando su implementación.
    */
    public function valorPeaje(){
        $valorPadre = parent::valorPeaje(); //guardo el valor de la clase padre
        $capacidad= $this->getCapacidadMaxima();
        $calculo = $valorPadre * $capacidad;
        return $calculo;
    }
}