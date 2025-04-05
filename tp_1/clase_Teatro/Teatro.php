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
    public function getNombreTeatro(): string
    {
        return $this->nombreTeatro;
    }

    public function getDireccionTeatro(): string
    {
        return $this->direccionTeatro;
    }

    public function getArregloFunciones(): array
    {
        return $this->arrayFunciones;
    }

    // modificadoras set
    public function setNombreTeatro($nuevoNombre): void
    {
        $this->nombreTeatro = $nuevoNombre;
    }

    public function setDireccionTeatro($nuevaDireccion): void
    {
        $this->direccionTeatro = $nuevaDireccion;
    }

    public function setArregloFunciones($nuevasFunciones): void
    {
        $this->arrayFunciones = $nuevasFunciones;
    }

    // metodos nuevos
    /**
     * cambia el nombre del teatro
     * @param string $cambioN
     * @return string
     */
    public function cambiarNombreTeatro(string $cambioNombre): string
    {
        $this->setNombreTeatro($cambioNombre);
        return $this->getNombreTeatro();
    }

    /**
     * cambia la direccion del teatro
     * @param string $cambioD
     * @return string
     */
    public function cambiarDireccionTeatro(string $cambioDireccion): string
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
    public function cambiarFuncion(int $indice, string $nuevoNombreFuncion, float $nuevoPrecioFuncion): array
    {
        if ($indice >= 0 && $indice < 4) {
            $this->arrayFunciones[$indice] = [
                "nombre" => $nuevoNombreFuncion,
                "precio" => $nuevoPrecioFuncion
            ];
        }
        return $this->arrayFunciones;
    }

    /**
     * muestra las funciones teatrales del arreglo
     * @return array $cadenaArreglo
     */
    public function mostrarFunciones()
    {
        //Array $cadenaArreglo
        $cadenaArreglo = "";
        foreach ($this->getArregloFunciones() as $indice => $funcion) {
            $cadenaArreglo .= ">Función " . ($indice + 1) . ": " . $funcion["nombre"] . "\n";
            $cadenaArreglo .= ">Precio: $" . $funcion["precio"] . "\n";
        }
        return $cadenaArreglo;
    }

    // redefinición del método __toString()
    public function __toString(): string
    {
        $mostrar = $this->mostrarFunciones();
        $mensaje = ">Nombre del teatro: " . $this->nombreTeatro . "\n" .
            ">Dirección: " . $this->direccionTeatro . "\n" .
            $mostrar;
        return $mensaje;
    }
}
