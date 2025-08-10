<?php
class Persona{
    //atributos 
    private $identificacion;
    private $nombre;
    private $apellido;

    //constructor
    public function __construct($videntificacion, $vnombre, $vapellido){
        $this->identificacion=$videntificacion;
        $this->nombre=$vnombre;
        $this->apellido=$vapellido;
    }

    //acceso
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setIdentificacion($videntificacion){
        $this->identificacion=$videntificacion;
    }
    public function setNombre($vnombre){
        $this->nombre=$vnombre;
    }
    public function setApellido($vapellido){
        $this->apellido=$vapellido;
    }

    //redefinicion toString
    public function __toString(){
        return "ID ".$this->getIdentificacion() . "\n".
        "Nombre ".$this->getNombre() . "\n".
        "Apellido ".$this->getApellido() . "\n";
    }
}


?>