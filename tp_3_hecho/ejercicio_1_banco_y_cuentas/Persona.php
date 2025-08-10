<?php

class Persona{
    //variables instancia
    private $nombrePersona;
    private $apellidoPersona;
    private $numeroDocumento;

    //constructor
    public function __construct($nombre, $apellido, $nroDoc)
    {
        $this->nombrePersona=$nombre;
        $this->apellidoPersona=$apellido;
        $this->numeroDocumento=$nroDoc;
    }

    //observadoras (get)
    public function getNombrePersona(){
        return $this->nombrePersona;
    }
    public function getApellidoPersona(){
        return $this->apellidoPersona;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    //modificadoras (set)
    public function setNombrePersona($nombre){
        $this->nombrePersona=$nombre;
    }
    public function setApellidoPersona($apellido){
        $this->apellidoPersona=$apellido;
    }
    public function setNumeroDocumento($nroDoc){
        $this->numeroDocumento=$nroDoc;
    }

    //redefinir el metodo __toString()
    public function __toString(){
        $mensaje = 
        "Nombre: " . $this->getNombrePersona() . "\n" .
        "Apellido: " . $this->getApellidoPersona() . "\n" .
        "Numero documento: " . $this->getNumeroDocumento() ;
        return $mensaje;
    }
}





?>