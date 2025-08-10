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
            if ($objMostrador->atiende($unTramite)) {
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
    public function atender($unCliente)
    {
        $tramite = $unCliente->getTramite();
        $mostrador = $this->mejorMostradorPara($tramite);
        if ($mostrador !== null) {
            $objCola = $mostrador->getObjetoCola();
            $colClientes = $objCola->getArrayClientes();
            array_push($colClientes, $unCliente);
            $objCola->setArrayClientes($colClientes); //seteo el array con el nuevo cliente
        }
        return $mostrador; // retorna null o el mostrador apto para el cliente
    }

    /**
     *  método que retorna el promedio de trámites ingresados por día.
     */
    public function promTramitesIngresadosDia()
    {
        //recorrido: array mostrador--> obj mostrador --> array tramites(acá consigo la cantidad total de tramites) -> obj tramite (acá obtengo la fecha de cada tramite y el contador de suma?)
        $colMostradores = $this->getArrayMostradores();
        $totalTramites = 0;
        $promedio = 0;
        $unaFecha = [];
        foreach ($colMostradores as $objMostrador) {
            $colTramites = $objMostrador->getArrayColaTramites(); //recupero el array de tramites
            foreach ($colTramites as $objTramite) {
                $fecha = $objTramite->getFechaIngreso();
                $totalTramites++;
                $unaFecha[$fecha] = true; //con esto me aseguro que no se repiten las fechas
            }
        }
        $cantidadDias = count($unaFecha);

        if ($cantidadDias > 0) {
            $promedio = $totalTramites / $cantidadDias;
        } 
        return $promedio; //devuelve cero, o el promedio real
    }


    /**
     * método que retorna el mostrador con mayor porcentaje de tramites resueltos (sobre el total recibido) en el mes actual (o en un rango de fechas - pueden usar el tda fecha o clases de php, por ejemplo usar el getdate() de Php).
     * tiene que ingresar una fecha o un mes por parametro? no queda claro 
     * podria usar el metodo porcentajeTramitesResuelto() de la clase mostrador pero no usa fechas 
    */
    public function mostradorResuelveMasTramites(){
        $colMostradores = $this->getArrayMostradores();
        $mejorMostrador = null;
        $mayorPorcentaje = -10000000000000;
        $mesActual = date('m');
        $anioActual = date('Y');
    
        foreach ($colMostradores as $mostrador) {
            $colTramites = $mostrador->getArrayColaTramites();
            $total = 0;
            $cerrados = 0;
    
            foreach ($colTramites as $tramite) {
                $fecha = $tramite->getFechaIngreso(); 
                $partes = explode("/", $fecha);
                $mes = $partes[1];
                $anio = $partes[2];

                if ($mes == $mesActual && $anio == $anioActual) {
                    $total++;
                    $estado = $tramite->getEstado();
                    if ($estado == "cerrado") {
                        $cerrados++;
                    }
                }
            }
            if ($total > 0) {
                $porcentaje = ($cerrados / $total) * 100;
    
                if ($porcentaje > $mayorPorcentaje) {
                    $mayorPorcentaje = $porcentaje;
                    $mejorMostrador = $mostrador;
                }
            }
        }
        return $mejorMostrador;
    }

}
