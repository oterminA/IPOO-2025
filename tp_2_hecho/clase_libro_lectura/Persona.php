<?php
class Persona{
    //variables instancia
    private $nombreApellido;
    private $tipoDocumento;
    private $numeroDocumento;

    //constructor
    public function __construct($nombreApellido, $tipoDoc, $nroDoc)
    {
        $this->nombreApellido=$nombreApellido;
        $this->tipoDocumento=$tipoDoc;
        $this->numeroDocumento=$nroDoc;
    }

    //observadoras (get)
    public function getNombreApellido(){
        return $this->nombreApellido;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    //modificadoras (set)
    public function setNombreApellido($nombreApellido){
        $this->nombreApellido=$nombreApellido;
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
        "Nombre y apellido: " . $this->getNombreApellido() . "\n" .
        "Tipo documento: " . $this->getTipoDocumento() . "\n" .
        "Numero documento: " . $this->getNumeroDocumento() . "\n" ;
        return $mensaje;
    }
}





?>