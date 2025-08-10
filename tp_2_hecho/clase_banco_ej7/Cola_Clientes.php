<?php
class Cola_Clientes{
    //atributos (variables instancia)
    private $arrayClientes; // array de clase persona(cliente)
    private $capacidadMaxima;

    //metodo constructor
    public function __construct($arrayClientes, $capacidadMaxima)
    {
        $this->arrayClientes=$arrayClientes;   
        $this->capacidadMaxima=$capacidadMaxima;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayClientes(){
        return $this->arrayClientes;
    }
    public function getCapacidadMaxima(){
        return $this->capacidadMaxima;
    }

    //set
    public function setArrayClientes($arrayClientes){
        $this->arrayClientes=$arrayClientes;
    }
    public function setCapacidadMaxima($capacidadMaxima){
        $this->capacidadMaxima=$capacidadMaxima;
    }

    /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
    */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if($cantidadArreglo == 0){
            $mensaje = "Arreglo sin elementos. \n";
        }else{
            for($i=0; $i<$cantidadArreglo; $i++){
                $mensaje = $mensaje . "Cliente N°". $i+1 . ":\n". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Cola de clientes----\n " . $this->recorrerLosArreglos($this->getArrayClientes()) . "\n". 
        "Capacidad maxima: " . $this->getCapacidadMaxima() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * funcion para saber cuantos clientes hay en la cola
    */
    public function cantidadClientesEnCola() {
        $colClientes = $this->getArrayClientes();
        $cantidad = count($colClientes);
        return $cantidad;
    }
}