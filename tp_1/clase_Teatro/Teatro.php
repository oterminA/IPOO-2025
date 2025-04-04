<?php
//Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene un nombre y un precio. Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase, teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de un función y el precio. Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con las claves “nombre” y “precio”.

class Teatro
{
    //variables instancia
    private $nombreTeatro;
    private $direccionTeatro;
    private $arrayFunciones;
    //método constructor
    public function __construct($nombreT, $direccionT)
    {
        $this->nombreTeatro = $nombreT;
        $this->direccionTeatro = $direccionT;
        $this->arrayFunciones = [];
    }

    //observadoras-get
    public function getNombreTeatro()
    {
        return $this->nombreTeatro;
    }
    public function getDireccionTeatro()
    {
        return $this->direccionTeatro;
    }
    public function getFunciones()
    {
        return $this->arrayFunciones;
    }

    //modificadoras-set
    public function setNombreTeatro($nombreT)
    {
        $this->nombreTeatro = $nombreT;
    }
    public function setDireccionTeatro($direccionT)
    {
        $this->direccionTeatro = $direccionT;
    }
    public function setFunciones()
    {
        $this->arrayFunciones  = [];
    }

    //metodos nuevos
    /**
     * se puede cambiar el nombre del teatro 
     * 
     * @return string $cambio
     */
    public function cambiarNombreTeatro($cambio)
    {
        $this->setNombreTeatro($cambio);
        $cambio = $this->getNombreTeatro();
        return $cambio;
    }

    /**
     * se puede cambiar la direccion del teatro 
     * 
     * @return string $cambio
     */
    public function cambiarDireccionTeatro($cambio)
    {
        $this->setDireccionTeatro($cambio);
        $cambio = $this->getDireccionTeatro();
        return $cambio;
    }

    /**
     * muestra el arreglo de funciones
     */
    public function mostrarFunciones()
    {
        $arrayFunciones = $this->getFunciones();
        $cadena = "";
        foreach ($arrayFunciones as $indice => $elemento) {
            $cadena = "Funcion " . ($indice + 1) . ":\n" . "Nombre: " . $elemento["nombre"] . "\n" . "Precio: $" . $elemento["precio"] . "\n";
        }
        return $cadena;
    }


    /**
     * se puede cambiar el nombre y el precio de las funciones
     */
    // public function cambiarFunciones($indice,$nombreActual, $nombreN, $precioN) {
       
    // }


    //redefinición metodo __toString()
    public function __toString()
    {
        $mensaje = ">Nombre del teatro: " . $this->getNombreTeatro() . "\n" .
            ">Direccion del teatro: " . $this->getDireccionTeatro() . "\n" ; 
            //falta agregar las funciones
        return $mensaje;
    }
}
