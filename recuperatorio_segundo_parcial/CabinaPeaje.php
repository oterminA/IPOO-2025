<?php
/*Implementar en la clase CabinaPeaje el método cobrarPeaje($unTipoRegistroVehículo, $info)﻿ que obtiene el valor del peaje del vehículo, genera y retorna el recibo correspondiente. 

La función recibe por parámetro un tipo que permite identificar el tipo de registro que corresponde y un arreglo asociativo $info con la información correspondiente según el tipo de registro. Crear el tipo de registro correspondiente, el recibo y retornarlo como resultado de la función*/
class CabinaPeaje{
    //atributos (variables instancia)
    private $arrayRecibos;
    private $arrayRegistros;


    //metodo constructor
    public function __construct($arrayRecibos, $arrayRegistros)
    {
        $this->arrayRecibos=$arrayRecibos;   
        $this->arrayRegistros=$arrayRegistros;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayRecibos(){
        return $this->arrayRecibos;
    }
    public function getArrayRegistros(){
        return $this->arrayRegistros;
    }

    //set
    public function setArrayRecibos($arrayRecibos){
        $this->arrayRecibos=$arrayRecibos;
    }
    public function setArrayRegistros($arrayRegistros){
        $this->arrayRegistros=$arrayRegistros;
    }

    /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
    */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if($cantidadArreglo == 0){
            $mensaje = "Arreglo sin elementos. \n";
        }else{
            for($i=0; $i<$cantidadArreglo; $i++){
                $mensaje = $mensaje . "Elemento N°". $i+1 . ": ". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Coleccion de recibos---- \n" .$this->recorrerLosArreglos($this->getArrayRecibos())  . "\n".
        "Coleccion de registros----\n " . $this->recorrerLosArreglos($this->getArrayRegistros())  . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método cobrarPeaje($unTipoRegistroVehículo, $info)﻿ que obtiene el valor del peaje del vehículo, genera y retorna el recibo correspondiente. La función recibe por parámetro un tipo que permite identificar el tipo de registro que corresponde y un arreglo asociativo $info con la información correspondiente según el tipo de registro. Crear el tipo de registro correspondiente, el recibo y retornarlo como resultado de la función
    */
    public function cobrarPeaje($unTipoRegistroVehículo, $info){
        $arregloRecibos = $this->getArrayRecibos(); //obtengo la coleccion de arreglos
        $arregloRegistros = $this->getArrayRegistros(); //obtengo la coleccion de arreglos
        switch ($unTipoRegistroVehículo) { //para hacer los new de los vehixulos segun cuales sean
            case "Camion":
                $nroPatente = $info["nroPatente"];
                $peso = $info["peso"];
                $cantEjes = $info["cantEjes"];
                $objVehiculo = new RegistrosCamiones($nroPatente, $peso , $cantEjes);
                break;
            case "Escolar":
                $nroPatente = $info["nroPatente"];
                $capacidadMax=$info["capacidadMaxima"];
                $objVehiculo = new RegistrosEscolares($nroPatente,$capacidadMax);
             break;
                case "Particular":
                $nroPatente = $info["nroPatente"];
                $objVehiculo = new RegistrosVehiculo($nroPatente);
                break;
        }
        $valorPeaje = $objVehiculo->getValorPeaje(); //obtengo el valor del peaje de ese obj vehiculo segun lo que puse en los registros
        $recibo = new Recibos($nroRecibo,$valor,$fecha,$hora,$objVehiculo); //puedo poner null o pogno esas variablessss?
    
        array_push($arregloRecibos, $recibo);
        $this->setArrayRecibos($arregloRecibos); //seteo el arreglo
        array_push($arregloRegistros, $objVehiculo);
        $this->setArrayRecibos($arregloRegistros); //seteo el arreglo
        return $recibo; //retorno el recibo
    }


    /**
     * método reciboMayorMonto($fecha) que retorna el recibo con mayor valor de peaje para una fecha dada.
    */
    public function reciboMayorMonto($fecha){
        $arregloRecibos = $this->getArrayRecibos(); //obtengo la coleccion de arreglos
        $montoMayor = -11111111111111111111111111111111111111111; 
        foreach ($arregloRecibos as $objRecibo) { //hago el foreach porque entiendo que tiene que revisar todas las fechas, no una en particular
            $fechaObjRecibo = $objRecibo->getFecha(); //recupero la fecha
            if ($fecha === $fechaObjRecibo){
                $montoObjRecibo = $objRecibo->getValor();
                if ($montoObjRecibo > $montoMayor){
                    $montoMayor = $montoObjRecibo; //ahi se van cargando los montos mayores hasta que solo quede el más alto
                }
            }
        }
        return $montoMayor; //retorno elmonto mas alto
    }

    /**
     * Implementar en la clase CabinaPeaje el método recaudacionXTipoVehiculo($fecha,$tipoRegistroVehiculo) que retorna el monto total recaudado por la cabina, para una fecha y un tipo de vehículo dado. (Puede utilizar la función de PHP get_class($objeto) que retorna el nombre de la clase a la que pertenece el objeto. Por ejemplo get_class($unaInstanciaCamion) retorna el nombre la clase «Camion»   )
    */
    public function recaudacionXTipoVehiculo($fecha,$tipoRegistroVehiculo){
         //recibo->fecha y obj registro tienen que ser lo mismo
        $arregloRecibos = $this->getArrayRecibos(); //obtengo la coleccion de arreglos
        $i=0;
        $cantRecibos = count($arregloRecibos);//saco la cantidad de registros q hay ahi
        $encontrado = false;//bandera en false por defecto
        $monto = -1; //uso esto para despues en el test ver si la cabina obtuvo alfun monto o no y por eso devuelve -1

        while(($i<$cantRecibos) && !$encontrado){
            $objRecibo = $arregloRecibos[$i]; //recupero un obj registro
            $fechaObjRegistro = $objRecibo->getFecha(); //recupero la fecha de ese recibo
            $refObjRegistro = $objRecibo->getObjRegistro();
            $tipo = get_class($refObjRegistro);

            if(($fecha === $fechaObjRegistro) && ($tipoRegistroVehiculo === $tipo)){ //si coinciden
                $monto = $objRecibo->getValor();
            }
        }
        return $monto; //un monto real o -1 porque no hay monto
    }


    /**
     * Implementar en la clase CabinaPeaje el método totalRecaudado($fecha) que retorna el monto total recaudado por la cabina para una fecha dada.
    */
    public function totalRecaudado($fecha)
    {
        $arregloRecibos = $this->getArrayRecibos(); //obtengo la coleccion de arreglos
        $totalRecaudado = 0;
        foreach ($arregloRecibos as $objRecibo) {
            $fechaObj = $objRecibo->getFecha();
            if ( $fechaObj=== $fecha) { //o sea si coinciden
                $valorObj = $objRecibo-> getValor();
                $totalRecaudado = $totalRecaudado + $valorObj;
            }
        }
        return $totalRecaudado; 
    }
}