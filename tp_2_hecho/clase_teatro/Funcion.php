<?php
class Funcion{
    //atributos (variables instancia) nombre, horario de inicio, duración de la obra y precio. 
    private $nombre;
    private $horarioInicio;
    private $duracion;
    private $precio;

    //metodo constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio)
    {
        $this->nombre=$nombre;   
        $this->horarioInicio=$horarioInicio;   
        $this->duracion=$duracion;   
        $this->precio=$precio;   

    }

    //metodos de accedo: getters  y setters
    //get
    public function getNombre(){
        return $this->nombre;
    }
    public function getHorarioInicio(){
        return $this->horarioInicio;
    }
    public function getDuracion(){
        return $this->duracion;
    }
    public function getPrecio(){
        return $this->precio;
    }

    //set
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setHorarioInicio($horarioInicio){
        $this->horarioInicio=$horarioInicio;
    }
    public function setDuracion($duracion){
        $this->duracion=$duracion;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $horario = $this->getHorarioInicio();
        $mensaje = 
        "Nombre funcion: " . $this->getNombre() . "\n". 
        "Horario inicio: " . $horario["hora"] . ":" . $horario["minutos"] . "\n" .
        "Duracion: " . $this->getDuracion() . "hs\n".
        "Precio: $" . $this->getPrecio() . "\n";
        return $mensaje;
    }

    //metodos nuevos
}