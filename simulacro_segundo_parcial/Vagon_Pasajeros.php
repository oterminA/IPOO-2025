<?php
/*1. Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. 
Es importante tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos.
Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del peso de la carga, dicho índice se guarda en cada vagón de carga.
2. Implementar el método incorporarPasajeroVagon que recibe por parámetro la cantidad de pasajeros
que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan el
peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no
agregar los pasajeros al vagón.
3. Implementar el método incorporarCargaVagon que recibe por parámetro la cantidad de carga que va
a transportar el vagón y tiene la responsabilidad de actualizar las variables instancias que representan
el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la
carga al vagón.
4. Implementar el método calcularPesoVagon y redefinirlo según sea necesario. No olvidar agregar el
peso que tiene el vagón vacío. */
class Vagon_Pasajeros extends Vagon
{
    //atributos (variables instancia)
    private $cantidadMaximaPasajeros;
    private $cantidadPasajerosTransporta;
    private $pesoPromedio;


    //metodo constructor
    public function __construct($anio, $largo, $ancho, $pesoVacio, $cantMaxPasajeros, $cantPasajTransporta)
    {
        parent::__construct($anio, $largo, $ancho, $pesoVacio);
        //pongo el atributo normalmente
        $this->cantidadMaximaPasajeros = $cantMaxPasajeros;
        $this->cantidadPasajerosTransporta = $cantPasajTransporta;
        $this->pesoPromedio = 50; //lo pongo asi porque dice "considerando un peso promedio por pasajero de 50kg" 
    }

    //metodos de accedo: getters  y setters
    //get
    public function getCantidadMaximaPasajeros()
    {
        return $this->cantidadMaximaPasajeros;
    }
    public function getCantidadPasajerosTransporta()
    {
        return $this->cantidadPasajerosTransporta;
    }
    public function getPesoPromedio()
    {
        return $this->pesoPromedio;
    }

    //set
    public function setCantidadMaximaPasajeros($cantMaxPasajeros)
    {
        $this->cantidadMaximaPasajeros = $cantMaxPasajeros;
    }
    public function setCantidadPasajerosTransporta($cantPasajTransporta)
    {
        $this->cantidadPasajerosTransporta = $cantPasajTransporta;
    }
    public function setPesoPromedio($pesoProm)
    {
        $this->pesoPromedio = $pesoProm;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            parent::__toString() .
            "Cantidad maxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n" . 
            "Cantidad pasajeros: " . $this->getCantidadPasajerosTransporta() . "\n" . 
            "Peso promedio pasajero: " . $this->getPesoPromedio() . "kg\n" ;
        return $mensaje;
    }

    /**
     * metodo polimorfico, redefinicion de calcularPesoVagon()
     * ?????
    */
    public function calcularPesoVagon(){
        $pesoPadre = parent::calcularPesoVagon(); //acá se guarda el resultado del peso del vagon vacio, metodo heredado
        $pesoPromedio = $this->getPesoPromedio(); //guardo el peso promedio que son 50kg
        $cantidadPasajeros = $this->getCantidadPasajerosTransporta(); //guardo la cantidad de gente
        $pesoVagonActualizado = $pesoPadre + ($pesoPromedio * $cantidadPasajeros) ;    //peso vagon vacio se calcula de acuerdo a la cant de pasajeros que se transporta y el peso promedio siendo 50kg
        $this->setPesoVagonVacio($pesoVagonActualizado);  //seteo el valor 
        return $pesoVagonActualizado; //se retorna el peso actualizado del vagon
    }

    /**
     * método que recibe por parámetro la cantidad de pasajeros que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan el peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no agregar los pasajeros al vagón.
     */
    public function incorporarPasajeroVagon($pasajeros)
    {
        //PUEDE SER que acá tenga que usar la redefinicion del metodo de la clase padre
        $agregado = false; //valor por defecto, puede cambiar
        $cantidadGenteVagon = $this->getCantidadMaximaPasajeros(); //obtengo la cantidad máxima de pasajeros
        if ($pasajeros <= $cantidadGenteVagon) { //si la cantidad de pasajeros es menor o igual a la capacidad maxima del vagon, hago lo que tengo que hacer
            $this->setCantidadPasajerosTransporta($cantidadGenteVagon-$pasajeros); //actualizo la cantidad de gente en el vagon
            $pesoPadre = parent::calcularPesoVagon(); //???
            $pesoPromedio = $this->getPesoPromedio(); //guardo el peso promedio que son 50kg
            $cantidadPasajeros = $this->getCantidadPasajerosTransporta(); //guardo la cantidad de gente
            $pesoVagonActualizado = $pesoPadre + ($pesoPromedio * $cantidadPasajeros) ;    //peso vagon vacio se calcula de acuerdo a la cant de pasajeros que se transporta y el peso promedio siendo 50kg
            $this->setPesoVagonVacio($pesoVagonActualizado);  //seteo el valor 
            $agregado= true; //se pudo agregar a los pasajeros
        }
        return $agregado; //devuelve boolean, true si se puso agregar a la gente y false si no
    }
}
