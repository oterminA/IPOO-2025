<?php
class Mostrador
{
    //atributos (variables instancia)
    private $arrayColaTramites; // array ref a clase tramite, cada mostrador atiende cierto tipo de tramites, este arreglo seria por ejemplo de tramites de creacion de caja de ahorros (?)
    private $objetoCola; // ref instancia clase cola

    //metodo constructor
    public function __construct($arrayColaTramites, $objetoCola)
    {
        $this->arrayColaTramites = $arrayColaTramites;
        $this->objetoCola = $objetoCola;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayColaTramites()
    {
        return $this->arrayColaTramites;
    }
    public function getObjetoCola()
    {
        return $this->objetoCola;
    }

    //set
    public function setArrayColaTramites($arrayColaTramites)
    {
        $this->arrayColaTramites = $arrayColaTramites;
    }
    public function setObjetoCola($objetoCola)
    {
        $this->objetoCola = $objetoCola;
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
                $mensaje = $mensaje . "Tramite N°" . $i + 1 . ":\n" . $arreglo[$i] . "\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Coleccion de tramites----\n " . $this->recorrerLosArreglos($this->getArrayColaTramites()) . "\n" .
            "Cola de clientes: " . $this->getObjetoCola() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     *  devuelve true o false indicando si el tramite se puede atender o no en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con alguno de los tipos de trámite que atiende el mostrador.
     */
    public function atiende($unTramite)
    {
        $colTramites = $this->getArrayColaTramites(); //guardo el array
        $cantidad = count($colTramites); //cantidad de tramites
        $i = 0;
        $atiende = false; //bandera
        while (($i < $cantidad) && !$atiende) {
            $objTramite = $colTramites[$i]; //recupero un obj tramite
            $tipoObjTramite = $objTramite->getTipoTramite(); //recupero el tipo de tramite de ese obj tramite

            if ($tipoObjTramite == $unTramite) {
                $atiende = true; //cambio la bandera xq si se atiende ese tramite
            }
            $i++;
        }
        return $atiende; //retorno boolean
    }

    /**
     * esta etapa es cuando la persona ya esta en el mostrador explicando el trámite para que sea tratado. Ya salió de la cola de trámites y está siendo atendido en el mostrador correspondiente.
     */
    public function ingresarTramite()
    {
        //tengo q hacer un nuevo obj tramite: $horarioIngreso, $horarioCierre, $objetoCliente, $fechaIngreso, $estado
        //como obtengo las otras cosas? puedo poner null?
        $colTramites=$this->getArrayColaTramites();
        $fechaActual = date("d/m/Y");

        $nuevoTramite = new Cola_Tramites(null, null, null, null, $fechaActual, "abierto");
        array_push($colTramites, $nuevoTramite);
        $this->setArrayColaTramites($colTramites); //seteo la cola de tramites con el nuevo tramites
    }

    /**
     *  es cuando el trámite ha sido resuelto. Además, debe validar que el tramite a cerrar está abierto y setearlo en estado cerrado.
     */
    public function cerrarTramite()
    {
        $colTramites=$this->getArrayColaTramites();
        $i=0;
        $cantidad = count($colTramites);
        $cerrado = false;//bandera
        while(($i<$cantidad) && !$cerrado){
            $tramite = $colTramites[$i]; //recupero un tramite
            $estado = $tramite->getEstado();
            if ($estado == "abierto") {
                $tramite->setHorarioCierre(date("H:i")); //pongo la hora?
                $tramite->setEstado("cerrado");
            }
        }
    }

    /**
     *  el método retorna la cantidad promedio de trámites resueltos por día en este mes.
     */
    public function cantTramitesAtendidosMes()
    {
        //tengo q considerar los tramites cuyo estado=="cerrado"
        //descompongo la fecha con explode($delimitador, $cadena)
        $colTramites = $this->getArrayColaTramites();
        $mesActual = date("m");  // mes actual xra compararlo despues
        $anioActual = date("Y"); // año actual
        $promedio = 0;
        $contadorTotal = 0; // xra contar los tramites del mes actual
        $diasDistintos = []; //xra guardar los dias donde hay tramites cerrados
        $i = 0; //contador

        foreach ($colTramites as $unTramite) {
            $estado = $unTramite->getEstado();
            if ($estado == "cerrado") {
                $fecha = $unTramite->getFechaIngreso();
                $partes = explode("/", $fecha);
                $dia = $partes[0];
                $mes = $partes[1];
                $anio = $partes[2];

                if ($mes == $mesActual && $anio == $anioActual) {
                    $contadorTotal++; // sumo el trámite cerrado

                    $yaContado = false; //bandera
                    for ($j = 0; $j < $i; $j++) {
                        if ($diasDistintos[$j] == $dia) { //con esto me fijo si el dia ya fue contado
                            $yaContado = true;
                        }
                    }

                    if (!$yaContado) { //si el dia nuevo, lo guardo y cuento
                        $diasDistintos[$i] = $dia;
                        $i++;
                    }
                }
            }
        }
        if ($i > 0) { //para no dividir por cero
            $promedio = $contadorTotal / $i;
        }
        return $promedio; //devuelve el promedio o cero
    }

    /**
     *  método que da el porcentaje de tramites resueltos sobre el total de recibidos.
     */
    public function porcentajeTramitesResueltos()
    {
        //para calcular el porcentaje se divide la cantidad parcial por la cantidad total y luego se multiplica por 100
        //cantidad parcial = tramites resueltos
        //cantidad total =  todos los tramites del array
        $colTramites = $this->getArrayColaTramites();
        $cantidadTotal = count($colTramites); //cantidad total
        $cantidadParcial = 0;
        $porcentajeResueltos = 0;
        foreach ($colTramites as $unTramite) {
            $estado = $unTramite->getEstado();
            if ($estado == "cerrado") {
                $cantidadParcial++;
            }
        }
        if ($cantidadTotal > 0) {
            $porcentajeResueltos = (($cantidadParcial / $cantidadTotal) * 100);
        }
        return $porcentajeResueltos;
    }

    /**
     *  método que retorna la cantidad de trámites abiertos de un cliente.
     * en el enunciado no lo dice explicitamente pero creo que deberia recibir un dni por parametro
     */
    public function cantTramitesAbiertos($dni)
    {
        $colTramites = $this->getArrayColaTramites();
        $contador = 0;
        foreach ($colTramites as $objTramite) {
            $objCliente = $objTramite->getObjetoCliente();
            $docObjCliente = $objCliente->getNumeroDocumento();
            if ($dni == $docObjCliente) {
                $estado = $objTramite->getEstado();
                if ($estado === "abierto") {
                    $contador++;
                }
            }
        }
        return $contador; //devuelve cero o mas
    }

    /**
     *   método que retorna la cantidad de trámites cerrados de un cliente.
     */
    public function cantTramitesCerrados($dni)
    {
        $colTramites = $this->getArrayColaTramites();
        $contador = 0;
        foreach ($colTramites as $objTramite) {
            $objCliente = $objTramite->getObjetoCliente();
            $docObjCliente = $objCliente->getNumeroDocumento();
            if ($dni == $docObjCliente) {
                $estado = $objTramite->getEstado();
                if ($estado === "cerrado") {
                    $contador++;
                }
            }
        }
        return $contador; //devuelve cero o mas
    }

}
