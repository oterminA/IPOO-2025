<?php
class Canales{
    //atributos (variables instancia)
    private $tipoCanal;
    private $importe;
    private $esHD;

    //metodo constructor
    public function __construct($canal, $importe, $hd)
    {
        $this->tipoCanal=$canal;   
        $this->importe=$importe;   
        $this->esHD=$hd;   

    }

    //metodos de accedo: getters  y setters
    //get
    public function getTipoCanal(){
        return $this->tipoCanal;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function getEsHd(){
        return $this->esHD;
    }

    //set
    public function setTipoCanal($canal){
        $this->tipoCanal=$canal;
    }
    public function setImporte($importe){
        $this->importe=$importe;
    }
    public function setEsHd($hd){
        $this->esHD=$hd;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Tipo de canal: " . $this->getTipoCanal() . "\n".
        "Importe $: " . $this->getImporte() . "\n".
        "Es o no HD: " . $this->getEsHd() ? "Es HD. \n" : "No es HD \n"; 
        
        return $mensaje;
    }

    //metodos nuevos
}