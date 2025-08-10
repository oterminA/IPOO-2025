<?php
class Persona{
    //variables instancia
    private $nombrePersona;
    private $apellidoPersona;
    private $tipoDocumento;
    private $numeroDocumento;

    //constructor
    public function __construct($nombre, $apellido, $tipoDoc, $nroDoc)
    {
        $this->nombrePersona=$nombre;
        $this->apellidoPersona=$apellido;
        $this->tipoDocumento=$tipoDoc;
        $this->numeroDocumento=$nroDoc;
    }

    //observadoras (get)
    public function getNombrePersona(){
        return $this->nombrePersona;
    }
    public function getApellidoPersona(){
        return $this->apellidoPersona;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
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
    public function setTipoDocumento($tipoDoc){
        $this->tipoDocumento=$tipoDoc;
    }
    public function setNumeroDocumento($nroDoc){
        $this->numeroDocumento=$nroDoc;
    }

    //redefinir el metodo __toString()
    public function __toString(){
        $mensaje = 
        "Nombre: " . $this->getNombrePersona() . "\n" .
        "Apellido: " . $this->getApellidoPersona() . "\n" .
        "Tipo documento: " . $this->getTipoDocumento() . "\n" .
        "Numero documento: " . $this->getNumeroDocumento() . "\n" ;
        return $mensaje;
    }
}





?>