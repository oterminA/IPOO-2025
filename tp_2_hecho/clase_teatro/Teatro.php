<?php

class Teatro
{
    // variables instancia
    private $nombreTeatro;
    private $direccionTeatro;
    private $arrayFunciones; // ref a clase funcion

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
     * @return array
     */
    public function cambiarFuncion($nombre, $nuevoNombreFuncion, $nuevoPrecioFuncion)
    {
        $colFunciones = $this->getArregloFunciones();
        $i = 0;
        $cantidad = count($colFunciones);
        $encontrado = false; //bandera, la uso como segunda condicion para cortar el recorrido del bucle
        //uso el while porque el recorrido es parcial, cuando encuentro la funcion hago los cambios y salgo del bucle
        while (($i < $cantidad) && !$encontrado) {
            $objFuncion = $colFunciones[$i]; //recupero un obj funcion
            $objFunNombre = $objFuncion->getNombre();
            if ($objFunNombre == $nombre) {
                $encontrado = true;
                $objFuncion->setNombre($nuevoNombreFuncion);
                $objFuncion->setPrecio($nuevoPrecioFuncion);
            }
            $i++;
        }
        return $encontrado; //devuelvo la bandera, si es true se pudo cambiar, false no se pudo
    }


/**
 * Función para recorrer el arreglo de objetos y generar una cadena de texto.
 */
public function recorrerLosArreglos($arreglo)
{
    $mensaje = "";
    $cantidadArreglo = count($arreglo);

    if ($cantidadArreglo == 0) {
        $mensaje = "Arreglo sin elementos.\n";
    } else {
        for ($i = 0; $i < $cantidadArreglo; $i++) {
            $mensaje .= "Función N°" . ($i + 1) . ":\n" . $arreglo[$i] . "\n";
        }
    }

    return $mensaje;
}


    /**
     * verifica que no se solapen los horarios
    */
    public function verificarHorario($horario){
        $colFunciones= $this->getArregloFunciones();
        $i=0;
        $cant = count($colFunciones);
        $aceptado = true;
        while (($i<$cant) && $aceptado){
            $objFun = $colFunciones[$i];
            $horarioObjFun = $objFun->getHorarioInicio();
            if ($horario == $horarioObjFun){
                $aceptado=false; //no hay horarios iguales, no se solapan
            }
            $i++;
        }
        return $aceptado; //retorna cualquier valor booleano, lo voy a usar para saber en el test si el horario es aceptado o no, (aceptado=true=no se solapan)
    }


    // redefinición del método __toString()
    public function __toString()
    {
        $mensaje =
            ">Nombre del teatro: " . $this->nombreTeatro . "\n" .
            ">Dirección: " . $this->direccionTeatro . "\n" .
            ">Coleccion de funciones----\n" . $this->recorrerLosArreglos($this->getArregloFunciones()) . "\n";
        return $mensaje;
    }
}
