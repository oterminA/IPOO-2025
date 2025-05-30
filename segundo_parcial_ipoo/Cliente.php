<?php
class Cliente{
    //variables instancia
    private $tipoDocumento;
    private $numeroDocumento;

    //constructor
    public function __construct($tipoDoc, $nroDoc)
    {
        $this->tipoDocumento=$tipoDoc;
        $this->numeroDocumento=$nroDoc;
    }

    //observadoras (get)
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    //modificadoras (set)
    public function setTipoDocumento($tipoDoc){
        $this->tipoDocumento=$tipoDoc;
    }
    public function setNumeroDocumento($nroDoc){
        $this->numeroDocumento=$nroDoc;
    }

    //redefinir el metodo __toString()
    public function __toString(){
        $mensaje = 
        "Tipo documento: " . $this->getTipoDocumento() . "\n" .
        "Numero documento: " . $this->getNumeroDocumento() ;
        return $mensaje;
    }
}
?>