<?php
/**
 * En la clase Aerolíneas se registra la siguiente información: identificación, nombre y la colección de vuelos programados.
 * Se debe implementar el método  darVueloADestino que recibe por parámetro un destino junto a una cantidad de asientos libres y se debe retornar una colección con los vuelos disponibles a ese destino.
 * Implementar en la clase Aerolinea el método incorporarVuelo que recibe como parámetro un vuelo, verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida. El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario.
 * Implemente en la clase Aerolinea  el método venderVueloADestino, que recibe por parámetro: la cantidad de asientos, el destino y una fecha. El método realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles y en la fecha deseada. En la implementación debe invocar al método asignarAsientosDisponibles y retornar la instancia del vuelo asignado o null en caso contrario.
 * En la clase Aerolínea  se debe implementar el método montoPromedioRecaudado que retorna el importe promedio recaudado por la aerolínea con cada uno de sus vuelos. La siguiente implementación cumple correctamente con el enunciado y las buenas prácticas de programación ? */

class Aerolinea{
    //atributos (variables instancia)
    private $identificacionAerolinea; //int
    private $nombreAerolinea; //string
    private $objetoArrayVuelo; //array de objetos de la clase Vuelo

    //metodo constructor
    public function __construct($identificacion, $nombre, $objArrayVuelo)
    {
        $this->identificacionAerolinea=$identificacion;
        $this->nombreAerolinea=$nombre;
        $this->objetoArrayVuelo=$objArrayVuelo; 
    }

    //metodos de accedo: getters  y setters
    //get
    public function getIdentificacionAerolinea(){
        return $this->identificacionAerolinea;
    }
    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }
    public function getObjetoArrayVuelo(){
        return $this->objetoArrayVuelo;
    }

    //set
    public function setIdentificacionAerolinea($identificacion){
        $this->identificacionAerolinea=$identificacion;

    }
    public function setNombreAerolinea($nombre){
        $this->nombreAerolinea=$nombre;
    }       
    public function setObjetoArrayVuelo($objArrayVuelo){
        $this->objetoArrayVuelo=$objArrayVuelo; 
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Identificacion aerolinea: " . $this->getIdentificacionAerolinea() . "\n" .
        "Nombre aerolinea: " . $this->getNombreAerolinea() . "\n" .
        "Coleccion de vuelo: " . $this->recorrerLosArreglos($this->getObjetoArrayVuelo()) . "\n" ;
        return $mensaje;
    }

    //metodos nuevos
    /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres
     */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        foreach ($arreglo as $elemento) {
            $mensaje .=  $elemento . "\n";
        }
        return $mensaje;
    }

    /**
     * metodo que recibe por parámetro un destino junto a una cantidad de asientos libres y se debe retornar una colección con los vuelos disponibles a ese destino.
    */
    public function darVueloADestino($destino, $asientosLibres)
    {
        $arrayVuelos = $this->getObjetoArrayVuelo();
        $coleccionVuelos = []; //de no poderse realizar, se va a devolver el arreglo vacio

        foreach ($arrayVuelos as $unVuelo) {
            //recorro el arreglo de vuelos, y verifico que coincida el destino con la disponibilidad de asientos
            $unDestino = $unVuelo->getDestinoVuelo();
            $disponibilidad = $unVuelo->getCantAsientosDisponibles(); //tira un booleano
            if (($unDestino == $destino) && $disponibilidad) {
                array_push($coleccionVuelos, $unVuelo);//si se puede entonces arreglo un vuelo en especifico al arreglo
                $this->setObjetoArrayVuelo($coleccionVuelos); 
            }
        }
        return $coleccionVuelos;
    }

    /**
     * recibe como parámetro un vuelo, verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida. El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario
    */
    public function incorporarVuelo($objVuelo){
        //el objetoVuelo va a tener toda la info de un vuelo en especifico
        $arrayVuelos = $this->getObjetoArrayVuelo();
        $incorporado = false; //seteo la bandera como negativa por defecto, no se incorporó el vuelo
        $i = 0;
        $cont = count($arrayVuelos); 
        //hago un while porque el recorrido es parcial
        while($i<$cont && !$incorporado){
            //guardo todos los datos en variables separadas y las comparo, si coinciden entonces no se puede incorporar el vuelo
            $unaFecha = $arrayVuelos[$i]->getFechaVuelo();
            $unDestino = $arrayVuelos[$i]->getDestinoVuelo();
            $horaPartida = $arrayVuelos[$i]->getHoraPartidaVuelo();
            $destinoObjVuelo = $objVuelo->getDestinoVuelo();
            $fechaObjVuelo = $objVuelo->getFechaVuelo();    
            $horaPartidaObjVuelo = $objVuelo->getHoraPartidaVuelo();
            if (($unDestino != $destinoObjVuelo) && ($unaFecha != $fechaObjVuelo) && ($horaPartida != $horaPartidaObjVuelo)) {
                $incorporado = true; //seteo la bandera como positiva, incorporo el vuel
                array_push($arrayVuelos, $objVuelo); //incorporo el vuelo al arreglo de vuelos
                $this->setObjetoArrayVuelo($arrayVuelos); //seteo el nuevo arreglo de vuelos a la aerolinea
            }
            $i++;
        }
        return $incorporado; 
    }

    /**
     *  recibe por parámetro: la cantidad de asientos, el destino y una fecha. El método realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles y en la fecha deseada. En la implementación debe invocar al método asignarAsientosDisponibles y retornar la instancia del vuelo asignado o null en caso contrario.
    */
    public function venderVueloADestino($cantidadAsientos, $destino, $fecha){
        $arrayVuelos = $this->getObjetoArrayVuelo();
        $vueloAsignado = null; //seteo la variable como nula por defecto, en este caso no asignaria el vuelo
        $i = 0;
        $cont = count($arrayVuelos); //para saber cuntos vuelos hay en el array
        //hago un while tambin porque el recorrido es parcial
        while($i<$cont && !$vueloAsignado){
            //guardo todos los datos en variables y las comparo, si coinciden entonces se puede hacer la venta
            $unaFecha = $arrayVuelos[$i]->getFechaVuelo();
            $unDestino = $arrayVuelos[$i]->getDestinoVuelo();
            $disponibilidad = $arrayVuelos[$i]->getCantAsientosDisponibles(); //tira un booleano
            if (($unDestino == $destino) && ($unaFecha == $fecha) && ($disponibilidad)) {
                //si coincide el destino y la fecha, entonces asigno el vuelo a la variable de vuelo asignado
                $vueloAsignado = $arrayVuelos[$i]; 
                //llamo al metodo anterior para que asigne los asientos disponibles al vuelo
                $vueloAsignado->asignarAsientosDisponibles($cantidadAsientos); 
            }
            $i++;
        }
        return $vueloAsignado;
    }

    /**
     * retorna el importe promedio recaudado por la aerolínea con cada uno de sus vuelos.
    */
    public function montoPromedioRecaudado(){
        $arrayVuelos = $this->getObjetoArrayVuelo();
        $suma=0;
        $cont = count($arrayVuelos); //para saber cuantos vuelos hay en el array
        //hago un for porque el recorrido es total
        for($i=0; $i<$cont; $i++){
            $importeCadaVuelo = $arrayVuelos[$i]->getImporteVuelo(); //guardo el monto de cada vuelo
            $suma = ($suma+ $importeCadaVuelo);
        }
        $promedio = $suma / $cont;
        return $promedio; 
    }
}
?>