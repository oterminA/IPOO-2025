<?php
class Tramite{
    //atributos (variables instancia)
    private $tipoTramite;
    private $horarioCreacion; //son arrays asociativos
    private $horarioResolucion;

    //metodo constructor
    public function __construct($tipoTramite, $horarioCreacion, $horarioResolucion)
    {
        $this->tipoTramite=$tipoTramite;
        $this->horarioCreacion=$horarioCreacion;   
        $this->horarioResolucion=$horarioResolucion;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getTipoTramite(){
        return $this->tipoTramite;
    }
    public function getHorarioCreacion(){
        return $this->horarioCreacion;
    }
    public function getHorarioResolucion(){
        return $this->horarioResolucion;
    }

    //set
    public function setTipoTramite($tipoTramite){
        $this->tipoTramite=$tipoTramite;
    }
    public function setHorarioCreacion($horarioCreacion){
        $this->horarioCreacion=$horarioCreacion;
    }
    public function setHorarioResolucion($horarioResolucion){
        $this->horarioResolucion=$horarioResolucion;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $creacion = $this->getHorarioCreacion();
        $resolucion = $this->getHorarioResolucion();
        $mensaje = 
        "Tipo de tramite: " . $this->getTipoTramite() . "\n". 
        "Hora creacion tramite: " . $creacion["hora"] . ":" . $creacion["minutos"] . "\n" .
        "Hora resolucion tramite: " . $resolucion["hora"] . ":" . $resolucion["minutos"] . "\n"; 
        return $mensaje;
    }
}