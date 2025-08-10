<?php
class Rubro{
    //atributos (variables instancia)
    private $descripcionRubro;
    private $porcentajeGananciaAplicado;

    //metodo constructor
    public function __construct($descripcion, $porcentaje)
    {
        $this->descripcionRubro=$descripcion;
        $this->porcentajeGananciaAplicado=$porcentaje;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getDescripcionRubro(){
        return $this->descripcionRubro;
    }
    public function getPorcentajeGananciaAplicado(){
        return $this->porcentajeGananciaAplicado;
    }

    //set
    public function setDescripcionRubro($descripcion){
        $this->descripcionRubro=$descripcion;
    }
    public function setPorcentajeGananciaAplicado($porcentaje){
        $this->porcentajeGananciaAplicado=$porcentaje;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Descripcion rubro: " . $this->getDescripcionRubro() . "\n". 
        "Porcentaje ganancia aplicado: " . $this->getPorcentajeGananciaAplicado() . "%\n";
        return $mensaje;
    }

    //metodos nuevos
}
?>