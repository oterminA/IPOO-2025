<?php
class RegistrosCamiones extends RegistrosVehiculo{
    //atributos (variables instancia)
    private $peso;
    private $cantidadaEjes;

    //metodo constructor
    public function __construct($nroPatente, $peso, $cantidadaEjes)
    {
        $this->peso=$peso; 
        $this->cantidadaEjes=$cantidadaEjes;   
    parent::__construct($nroPatente);
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPeso(){
        return $this->peso;
    }
    public function getCantidadEjes(){
        return $this->cantidadaEjes;
    }

    //set
    public function setPeso($peso){
        $this->peso=$peso;
    }
    public function setCantidadEjes($cantidadaEjes){
        $this->cantidadaEjes=$cantidadaEjes;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() . "\n" .
        "Peso: " . $this->getPeso() . "ton.\n". 
        "Cantidad ejes: " . $this->getCantidadEjes() . "kg\n";

        return $mensaje;
    }

    //metodos nuevos
    /**
     * el método que calcula y retorna el valor final a pagar por un vehículo. Redefinir según corresponda, indicando la clase en la que se debe encontrar el método y detallando su implementación.
    */
    public function valorPeaje(){
        $valorPadre = parent::valorPeaje(); //guardo el valor de la clase padre
        $cantEjes = $this->getCantidadEjes();
        $peso = $this->getPeso();
        $calculo= $valorPadre+100*$cantEjes+15*$peso;
        return $calculo;
    }
}