<?php
class Actividad_Cine extends Actividad{

    //atributos (variables instancia)
    private $genero;
    private $paisOrigen;

    //metodo constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio, $tipo, $genero, $paisOrigen)
    {
        $this->genero=$genero;  
        $this->paisOrigen=$paisOrigen;   
        parent::__construct($nombre, $horarioInicio, $duracion, $precio, $tipo);
    }

    //metodos de accedo: getters  y setters
    //get
    public function getGenero(){
        return $this->genero;
    }
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    //set
    public function setGenero($genero){
        $this->genero=$genero;
    }
    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen=$paisOrigen;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() . "\n" . 
        "Genero: " . $this->getGenero() . "\n". 
        "Pais de origen: " . $this->getPaisOrigen() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método el cual determina según las actividades del teatro cuál debería ser el cobro obtenido. 
     * Para obtener el mismo, hay que tener en cuenta que se deben sumar los precios de cada tipo de actividad programada para un mes dado, y aplicar un incremento por actividad según se detalle: si es una obra de teatro: 45%
    */
    public function darCostos(){
        //Para sumar un porcentaje a una cantidad, se multiplica la cantidad original por 1 más el porcentaje expresado como decimal.
        $costoPadre = parent::darCostos(); //por herencia recupero el resultado de la clase padre, que es el precio de base
        $porcentaje = 45 / 100; //calculo para tener el decimal
        $precioFinal = $costoPadre * (1+$porcentaje);
        return $precioFinal;
    }
}