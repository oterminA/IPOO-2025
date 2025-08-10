<?php
/*De los Paquetes Turísticos se almacena fecha desde, cantidad de días, destino, cantidad total de plazas y cantidad disponible de plazas. El constructor de la clase paquete turístico no recibe como parámetro la cantidad de plazas disponibles, debe ser un valor que se setea con el valor recibido para la cantidad total de plazas del paquete?*/
class Paquetes_turisticos{

    private $id; //esto lo pongo yo para poder usarlo más adelante, no lo muestro en el tostring
    private $fechaDesde;
    private $cantidadDias;
    private $objetoDestino; //referencia a la clase Destino
    private $cantidadTotalPlazas;
    private $plazasDisponibles;

    //metodo constructor
    public function __construct($id ,$fecha, $cantDias, $objDestino, $cantidadTotalPlazas, $plazasDisponibles)
    {
        $this->id=$id;
        $this->fechaDesde=$fecha;
        $this->cantidadDias=$cantDias;   
        $this->objetoDestino=$objDestino;  
        $this->cantidadTotalPlazas=$cantidadTotalPlazas;   
        $this->plazasDisponibles=$plazasDisponibles; 
    }

    //metodos de accedo: getters  y setters
    //get 
    public function getId(){
        return $this->id;
    }
    public function getFechaDesde(){
        return $this->fechaDesde;
    }
    public function getCantidadDias(){
        return $this->cantidadDias;
    }
    public function getObjetoDestino(){
        return $this->objetoDestino;
    }
    public function getCantidadTotalPlazas(){
        return $this->cantidadTotalPlazas;
    }
    public function getPlazasDisponibles(){
        return $this->plazasDisponibles;
    }

    //set
    public function setId($id){
        $this->id=$id;
    }
    public function setFechaDesde($fecha){
        $this->fechaDesde=$fecha;
    } 
    public function setCantidadDias($cantDias){
        $this->cantidadDias=$cantDias;
    }
    public function setObjetoDestino($objDestino){
        $this->objetoDestino=$objDestino;
    }
    public function setCantidadTotalPlazas($cantTotalPlazas){
        $this->cantidadTotalPlazas=$cantTotalPlazas;
    }
    public function setPlazasDisponibles($cantDisponiblePlazas){
        $this->plazasDisponibles=$cantDisponiblePlazas;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Fecha desde: " . $this->getFechaDesde() . "\n" .
        "Cantidad de dias: " . $this->getCantidadDias() . "\n" .
        "Informacion destino----\n: " . $this->getObjetoDestino() . "\n" .
        "Cantidad total de plazas: " . $this->getCantidadTotalPlazas() . "\n" .
        "Cantidad disponible de plazas: " . $this->getPlazasDisponibles() . "\n" ;
        return $mensaje;
    }

    //metodos nuevos
}

?>