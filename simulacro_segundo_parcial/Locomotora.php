<?php
/*1. Se registra la información de su peso y velocidad máxima.
*/
class Locomotora{
    //atributos (variables instancia)
    private $pesoLocomotora;
    private $velocidadLocomotora;

    //metodo constructor
    public function __construct($peso, $velocidad)
    {
        $this->pesoLocomotora=$peso; 
        $this->velocidadLocomotora=$velocidad;  
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPesoLocomotora(){
        return $this->pesoLocomotora;
    }
    public function getVelocidadLocomotora(){
        return $this->velocidadLocomotora;
    }

    //set
    public function setPesoLocomotora($peso){
        $this->pesoLocomotora=$peso;
    }
    public function setVelocidadLocomotora($velocidad){
        $this->velocidadLocomotora=$velocidad;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Peso locomotora: " . $this->getPesoLocomotora() . "kg\n". 
        "Velocidad locomotora: " . $this->getVelocidadLocomotora() . "\n";
        return $mensaje;
    }
}
?>