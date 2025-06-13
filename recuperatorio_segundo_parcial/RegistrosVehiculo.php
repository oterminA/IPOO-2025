<?php

class RegistrosVehiculo{
    //atributos (variables instancia)
    private $nroPatente;
    private $valorPeaje;

    //metodo constructor
    public function __construct($nroPatente)
    {
        $this->nroPatente=$nroPatente;   
        $this->valorPeaje=20; //dice que el valor por defecto es 20
    }

    //metodos de accedo: getters  y setters
    //get
    public function getNumeroPatente(){
        return $this->nroPatente;
    }
    public function getValorPeaje(){
        return $this->valorPeaje;
    }

    //set
    public function setNumeroPatente($nroPatente){
        $this->nroPatente=$nroPatente;
    }

    public function setValorPeaje($valorPeaje){
        $this->valorPeaje=$valorPeaje;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Numero de patente: " . $this->getNumeroPatente() . "\n". 
        "Valor peaje" . $this->getValorPeaje() . "\n";

        return $mensaje;
    }

    //metodos nuevos

    /**
     * el método que calcula y retorna el valor final a pagar por un vehículo. Redefinir según corresponda, indicando la clase en la que se debe encontrar el método y detallando su implementación.
    */
    public function valorPeaje(){
        return $this->getValorPeaje();
    }
}