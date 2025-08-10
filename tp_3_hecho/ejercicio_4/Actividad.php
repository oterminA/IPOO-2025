<?php
class Actividad{
    //atributos (variables instancia) nombre, horario de inicio, duración de la obra y precio. 
    private $nombre;
    private $horarioInicio;
    private $duracion;
    private $precio;
    private $tipo; //agregado por mi, para que se vea mejor en el test

    //metodo constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio, $tipo)
    {
        $this->nombre=$nombre;   
        $this->horarioInicio=$horarioInicio;   
        $this->duracion=$duracion;   
        $this->precio=$precio;   
        $this->tipo=$tipo;   

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
    public function getTipo(){
        return $this->tipo;
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
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $horario = $this->getHorarioInicio();
        $mensaje = 
        "Nombre funcion: " . $this->getNombre() . "\n". 
        "Horario inicio: " . $horario["hora"] . ":" . $horario["minutos"] . "\n" .
        "Duracion: " . $this->getDuracion() . "hs\n".
        "Precio: $" . $this->getPrecio() . "\n". 
        "Tipo: " . $this->getTipo() . "\n";

        return $mensaje;
    }

    //metodos nuevos
    /**
     * método el cual determina según las actividades del teatro cuál debería ser el cobro obtenido. 
    */
    public function darCostos(){
        //Para sumar un porcentaje a una cantidad, se multiplica la cantidad original por 1 más el porcentaje expresado como decimal.
        $precio= $this->getPrecio();
        return $precio;
    }

}