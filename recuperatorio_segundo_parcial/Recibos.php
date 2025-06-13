<?php
class Recibos{
    //atributos (variables instancia)
    private $nroRecibo;
    private $valor;
    private $fecha;
    private $hora;
    private $objetoRegistroVehiculo;

    //metodo constructor
    public function __construct($nroRecibo, $valor, $fecha, $hora, $objRegistroVehiculo)
    {
        $this->nroRecibo=$nroRecibo; 
        $this->valor=$valor; 
        $this->fecha=$fecha; 
        $this->hora=$hora; 
        $this->objetoRegistroVehiculo=$objRegistroVehiculo; 
    }

    //metodos de accedo: getters  y setters
    //get
    public function getNroRecibo(){
        return $this->nroRecibo;
    }
    public function getValor(){
        return $this->valor;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getHora(){
        return $this->hora;
    }
    public function getObjRegistro(){
        return $this->objetoRegistroVehiculo;
    }

    //set
    public function setNroRecibo($nroRecibo){
        $this->nroRecibo=$nroRecibo;
    }
    public function setValor($valor){
        $this->valor=$valor;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function setHora($hora){
        $this->hora=$hora;
    }
    public function setObjRegistro($objRegistroVehiculo){
        $this->objetoRegistroVehiculo=$objRegistroVehiculo;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Numero recibo: " . $this->getNroRecibo() . "\n". 
        "Valor: $" . $this->getValor() . "\n". 
        "Fecha: " . $this->getFecha() . "\n". 
        "Hora: " . $this->getHora() . "\n". 
        "Referencia al objeto Registro----\n " . $this->getObjRegistro() . "\n";

        return $mensaje;
    }

    //metodos nuevos
}