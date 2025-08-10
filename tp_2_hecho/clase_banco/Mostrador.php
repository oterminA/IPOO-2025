<?php
class Mostrador{
    //atributos (variables instancia)
    private $arrayTramites; // array ref a clase tramite, cada mostrador atiende cierto tipo de tramites, este arreglo seria por ejemplo de tramites de creacion de caja de ahorros (?)
    private $objetoCola; // ref instancia clase cola

    //metodo constructor
    public function __construct($arrayTramites, $objetoCola)
    {
        $this->arrayTramites=$arrayTramites;   
        $this->objetoCola=$objetoCola;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayTramites(){
        return $this->arrayTramites;
    }
    public function getObjetoCola(){
        return $this->objetoCola;
    }

    //set
    public function setArrayTramites($arrayTramites){
        $this->arrayTramites=$arrayTramites;
    }
    public function setObjetoCola($objetoCola){
        $this->objetoCola=$objetoCola;
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
                $mensaje = $mensaje . "Tramite N°". $i+1 . ":\n". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Coleccion de tramites----\n " . $this->recorrerLosArreglos($this->getArrayTramites()) . "\n". 
        "Cola de clientes: " . $this->getObjetoCola() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     *  devuelve true o false indicando si el tramite se puede atender o no en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con alguno de los tipos de trámite que atiende el mostrador.
    */
    public function atiende($unTramite){
        $colTramites = $this->getArrayTramites(); //guardo el array
        $cantidad = count($colTramites); //cantidad de tramites
        $i=0;
        $atiende =false; //bandera
        while (($i<$cantidad) && !$atiende){
            $objTramite = $colTramites[$i]; //recupero un obj tramite
            $tipoObjTramite = $objTramite-> getTipoTramite(); //recupero el tipo de tramite de ese obj tramite

            if ($tipoObjTramite == $unTramite){
                $atiende=true; //cambio la bandera xq si se atiende ese tramite
            }
            $i++;
        }
        return $atiende; //retorno boolean
    }

}