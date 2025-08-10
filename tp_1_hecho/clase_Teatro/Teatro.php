<?php

class Teatro
{
    // variables instancia
    private $nombreTeatro;
    private $direccionTeatro;
    private $arrayFunciones; // array de 4 funciones

    // metodo constructor
    public function __construct($nombre, $direccion, $aFunciones)
    {
        $this->nombreTeatro = $nombre;
        $this->direccionTeatro = $direccion;
        $this->arrayFunciones = $aFunciones;
    }

    // observadoras get
    public function getNombreTeatro()
    {
        return $this->nombreTeatro;
    }

    public function getDireccionTeatro()
    {
        return $this->direccionTeatro;
    }

    public function getArregloFunciones()
    {
        return $this->arrayFunciones;
    }

    // modificadoras set
    public function setNombreTeatro($nombre)
    {
        $this->nombreTeatro = $nombre;
    }

    public function setDireccionTeatro($direccion)
    {
        $this->direccionTeatro = $direccion;
    }

    public function setArregloFunciones($aFunciones)
    {
        $this->arrayFunciones = $aFunciones;
    }

    // metodos nuevos
    /**
     * cambia el nombre del teatro
     * @param string $cambioN
     * @return string
     */
    public function cambiarNombreTeatro($cambioNombre)
    {
        $this->setNombreTeatro($cambioNombre);
        return $this->getNombreTeatro();
    }

    /**
     * cambia la direccion del teatro
     * @param string $cambioD
     * @return string
     */
    public function cambiarDireccionTeatro($cambioDireccion)
    {
        $this->setDireccionTeatro($cambioDireccion);
        return $this->getDireccionTeatro();
    }

    /**
     * cambia la informacion de las funciones del teatro
     * @param int $indice
     * @param string $nombreNuevoFuncion
     * @param float $nuevoPrecioFuncion
     * @return array
     */
    public function cambiarFuncion($indice, $nuevoNombreFuncion, $nuevoPrecioFuncion)
    {
        $cambio = false;
        if ($indice >= 0 && $indice < count($this->arrayFunciones)) {
            $this->arrayFunciones[$indice] = [
                "nombre" => $nuevoNombreFuncion,
                "precio" => $nuevoPrecioFuncion
            ];
            $cambio= true;
        } 
        return $cambio;
    }
    

     /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
    */
    public function recorrerLosArreglos($arreglo)
{
    $mensaje = "";
    if (($arreglo)) {
        echo "Arreglo sin elementos.\n";
    }
    foreach ($arreglo as $index => $funcion) {
        $mensaje .= 
        "Función " . ($index + 1) . ": Nombre: " . $funcion["nombre"] .
        ". Precio: " . $funcion["precio"] . "\n";
    }
    return $mensaje;
}


    // redefinición del método __toString()
    public function __toString()
    {
        $mensaje = 
        ">Nombre del teatro: " . $this->nombreTeatro . "\n" .
        ">Dirección: " . $this->direccionTeatro . "\n" .
        ">Funciones----\n" . $this->recorrerLosArreglos($this->getArregloFunciones()) . "\n";
        return $mensaje;
    }
}
