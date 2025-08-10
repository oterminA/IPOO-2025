<?php
class Banco
{
    //atributos (variables instancia)
    private $arrayMostradores; //referencia a clase mostradores

    //metodo constructor
    public function __construct($arrayMostradores)
    {
        $this->arrayMostradores = $arrayMostradores;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayMostradores()
    {
        return $this->arrayMostradores;
    }

    //set
    public function setArrayMostradores($arrayMostradores)
    {
        $this->arrayMostradores = $arrayMostradores;
    }

    /**
     * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
     */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if ($cantidadArreglo == 0) {
            $mensaje = "Arreglo sin elementos. \n";
        } else {
            for ($i = 0; $i < $cantidadArreglo; $i++) {
                $mensaje = $mensaje . "Mostrador N°" . $i + 1 . ":\n" . $arreglo[$i] . "\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Coleccion de mostradores----\n" . $this->recorrerLosArreglos($this->getArrayMostradores()) . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * retorna la colección de todos los mostradores que atienden ese trámite.
     */
    public function mostradoresQueAtienden($unTramite)
    {
        //el recorrido seria: arreglo mostradores-> obj mostrador-> funcion esa
        $colMostradores = $this->getArrayMostradores();
        $arrayMostradorXTramite = [];

        foreach ($colMostradores as $objMostrador) {
            if ($objMostrador->atiende($unTramite)) {
                array_push($arrayMostradorXTramite, $objMostrador);
            }
        }
    
        return $arrayMostradorXTramite;
    }

    /**
     *  retorna el mostrador con la cola más corta con espacio para al menos una persona más y que atienda ese trámite; si ningun mostrador tiene espacio, retorna null.
     */
    public function mejorMostradorPara($unTramite)
    {
        //el recorrido seria: arreglo mostradores-> obj mostrador-> obj cola->capacidad
        //filtro primero los mostradores q hagan ese tramite y me quedo con el que tenga lacola de clientes mas corta
        $colMostradores = $this->getArrayMostradores();
        $masCorta = 99999999;
        $mejorMostrador = null; //es lo que devuelve si no se encuentra uno apto

        foreach ($colMostradores as $objMostrador) {
            if($objMostrador->atiende($unTramite)){
                $objCola = $objMostrador->getObjetoCola();
                $tamanioCola = $objCola->cantidadClientesEnCola();
                $capacidadMaxima = $objCola->getCapacidadMaxima();
    
                if ($tamanioCola < $capacidadMaxima) { // hay espacio disponible
                    if ($tamanioCola < $masCorta) { //calculo la más corta
                        $masCorta = $tamanioCola;
                        $mejorMostrador = $objMostrador;
                    }
                }
            }
        }
    
        return $mejorMostrador;
    }

    /**
     * cuando llega un cliente al banco se lo ubica en el mostrador que atienda el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; (en el test: si no hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en cuanto haya lugar en un mostrador”)
    */
    public function atender($unCliente){
        $tramite = $unCliente->getTramite();
        $mostrador = $this->mejorMostradorPara($tramite);
        if ($mostrador !== null) {
            $objCola = $mostrador->getObjetoCola();
            $colClientes = $objCola->getArrayClientes();
           array_push($colClientes, $unCliente);
           $objCola->setArrayClientes($colClientes);//seteo el array con el nuevo cliente
        }
    
        return $mostrador; // retorna null o el mostrador apto para el cliente
    }
}
