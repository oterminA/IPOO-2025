<?php
/*De los Destinos se almacena una identificación, el nombre del lugar y el valor por día en ese destino por pasajero*/
class Destino{
    //atributos (variables instancia)
    private $identificacionDestino;
    private $nombreDestino;
    private $valorPorDiaDestino;

    //metodo constructor
    public function __construct($idDestino, $nombre, $valorPorDia)
    {
        $this->identificacionDestino=$idDestino;
        $this->nombreDestino=$nombre;   
        $this->valorPorDiaDestino=$valorPorDia;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getIdentificacionDestino(){
        return $this->identificacionDestino;
    }
    public function getNombreDestino(){
        return $this->nombreDestino;
    }
    public function getValorPorDia(){
        return $this->valorPorDiaDestino;
    }

    //set
    public function setIdentificacionDestino($idDestino){
        $this->identificacionDestino=$idDestino;
    }
    public function setNombreDestino($nombre){
        $this->nombreDestino=$nombre;
    }
    public function setValorPorDiaDestino($valorPorDia){
        $this->valorPorDiaDestino=$valorPorDia;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Identificacion destino: " . $this->getIdentificacionDestino() . "\n". 
        "Nombre destino: " . $this->getNombreDestino() . "\n". 
        "Valor por dia: $" . $this->getValorPorDia() . "\n";
        return $mensaje;
    }

    //metodos nuevos
}
?>