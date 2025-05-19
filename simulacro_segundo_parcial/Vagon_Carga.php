<?php
/*1. Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. 
Es importante tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos..
Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga
transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del
peso de la carga, dicho índice se guarda en cada vagón de carga.???????
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
class Vagon_Carga extends Vagon
{
    //atributos (variables instancia)
    private $pesoMaximoTransporta;
    private $pesoCargaTransportada;
    //donde va el índice=0.2????

    //metodo constructor
    public function __construct($anio, $largo, $ancho, $pesoVacio, $pesoTransporte, $pesoCarga)
    {
        parent::__construct($anio, $largo, $ancho, $pesoVacio);
        //pongo el atributo normalmente
        $this->pesoMaximoTransporta = $pesoTransporte;
        $this->pesoCargaTransportada = $pesoCarga;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPesoMaximoTransporta()
    {
        return $this->pesoMaximoTransporta;
    }
    public function getPesoCargaTransportada()
    {
        return $this->pesoCargaTransportada;
    }

    //set
    public function setPesoMaximoTransporta($pesoTransporte)
    {
        $this->pesoMaximoTransporta = $pesoTransporte;
    }
    public function setPesoCargaTransportada($pesoCarga)
    {
        $this->pesoCargaTransportada = $pesoCarga;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            parent::__toString() .
            "Peso maximo que se transporta: " . $this->getPesoMaximoTransporta() . "kg\n" .
            "Peso carga transportada: " . $this->getPesoCargaTransportada() . "kg\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
    * metodo polimorfico, redefinicion de calcularPesoVagon()
    * ?????
    */
    public function calcularPesoVagon(){
        $pesoPadre = parent::calcularPesoVagon(); //acá se guarda el resultado del peso del vagon vacio, metodo heredado
        $pesoCarga = $this->getPesoCargaTransportada();//guardo el peso de la carga
        $pesoCargaActualizado = $pesoPadre + ($pesoCarga + ($pesoCarga * 0.2)); //El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del peso de la carga, dicho índice se guarda en cada vagón de carga?
        $this->setPesoVagonVacio($pesoCargaActualizado);
        return $pesoCargaActualizado; //devuelve el peso actualizado del vaogon    
    }
    


    /**
     *  método que recibe por parámetro la cantidad de carga que va a transportar el vagón y tiene la responsabilidad de actualizar las variables instancias que representan el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la carga al vagón.
     */
    public function incorporarCargaVagon($carga)
    {
        //PUEDE SER que acá tenga que usar la redefinicion del metodo de la clase padre
        $agregado = false; //valor por defecto, puede cambiar
        $pesoCarga = $this->getPesoCargaTransportada(); //obtengo la carga transportada
        $pesoMaximoTransporta = $this-> getPesoMaximoTransporta(); //guardo el peso max que se puede transportar
        $sumaPesos = $pesoCarga + $carga; //sumo los pesos de las cargas para comparar con el peso maximo que se transporta
        if ($sumaPesos <= $pesoMaximoTransporta) { //si la suma de ambos no excede el peso maximo que se puede transportar, hago:
            $pesoPadre = parent::calcularPesoVagon(); //acá se guarda el resultado del peso del vagon vacio, metodo heredado
            $pesoCargaActualizado = $pesoPadre + ($carga + ($carga * 0.2)); //El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del peso de la carga, dicho índice se guarda en cada vagón de carga?
            $this->setPesoVagonVacio($pesoCargaActualizado); //actualizo el peso del vagon
            $agregado = true; //se pudo agregar a los pasajeros
        }
        return $agregado; //devuelve boolean, true si se agregó
    }
}
