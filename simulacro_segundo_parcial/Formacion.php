<?php
/*
1. Se almacena la referencia a un objeto de la clase Locomotora , la colección de objetos de la clase Vagón
y el máximo de vagones que puede contener. Se tiene una única colección de vagones (o sea que los tipos de vagones estan mezclados en un solo array???)
2. Implementar el método incorporarPasajeroFormacion que recibe la cantidad de pasajeros que se
desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda ingresar la
cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
3. Implementar el método incorporarVagonFormacionque recibe por parámetro un objeto vagón y lo
incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito y falso en
caso contrario.
4. Implementar el método promedioPasajeroFormacion el cual recorre la colección de vagones y retorna
un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
5. Implementar el método pesoFormacion el cual retorna el peso de la formación completa.
6. Implementar el método retornarVagonSinCompletar el cual retorna el primer vagón de la formación que
aún no se encuentra completo*/
class Formacion
{
    //atributos (variables instancia)
    private $objetoLocomotora; //referencia a la clase Locomotora
    private $arrayVagones; //referencia a la clase Vagon (de carga y de pasajeros)
    private $maximoVagonesContenidos;

    //metodo constructor
    public function __construct($objLocomotora, $arregloVagones, $maxVagones)
    {
        $this->objetoLocomotora = $objLocomotora;
        $this->arrayVagones = $arregloVagones;
        $this->maximoVagonesContenidos = $maxVagones;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getObjetoLocomotora()
    {
        return $this->objetoLocomotora;
    }
    public function getArrayVagones()
    {
        return $this->arrayVagones;
    }
    public function getMaximoVagonesContenidos()
    {
        return $this->maximoVagonesContenidos;
    }

    //set
    public function setObjetoLocomotora($objLocomotora)
    {
        $this->objetoLocomotora = $objLocomotora;
    }
    public function setArrayVagones($arregloVagones)
    {
        $this->arrayVagones = $arregloVagones;
    }
    public function setMaximoVagonesContenidos($maxVagones)
    {
        $this->maximoVagonesContenidos = $maxVagones;
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
                $mensaje = $mensaje . "Elemento N°" . $i + 1 . ": " . $arreglo[$i] . "\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Objeto locomotora----\n " . $this->getObjetoLocomotora() . "\n" .
            "Coleccion vagones: " . $this->recorrerLosArreglos($this->getArrayVagones()) . "\n" .
            "Maximo de vagones contenidos " . $this->getMaximoVagonesContenidos() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     *método que recibe la cantidad de pasajeros que se desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda ingresar la cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
     */
    public function incorporarPasajeroFormacion($cantPasajeros)
    {
        //tengo que ir a la coleccion de vagones, buscar los vagones de pasajeros y ahi buscar el primero que tenga la capacidad para incorporar la cantidad que entra por parametro
        $coleccionVagones = $this->getArrayVagones(); // guardo la coleccion de vagones
        /////////////////PREGUNTA: si acá puedo obtener la coleccion de vagones, puedo ingresar tambien por la herencia y delegacion a la clase vagon pasajeros o la de carga?? o solo a la clase padre???? Creo que no podria porque la clase padre no conoce a sus hijas??
        $i = 0;
        $cantidadVagones = count($coleccionVagones); //guardo la cantidad de vagones
        $encontrado = false; //valor por defecto que puede cambiar, bandera
        while (($i < $cantidadVagones) && (!$encontrado)) {
            $objVagon = $coleccionVagones[$i]; //recupero un obj vagon en especifico
            if (is_a($objVagon, 'Vagon_Pasajeros')) { //acá tecnicamente estoy viendo si ese obj vagon es de la clase vagon     pasajeros, entonces ahi buscaria el primero que tenga la capacidad para meter esos pasajeros
                $incorporado = $objVagon->incorporarPasajeroVagon($cantPasajeros); //sin el $this->, y esto devuelve boolean
                if ($incorporado) {
                    $encontrado = true; //cambio a true la bandera porque se encontró el vagon para colocar a los pasajeros
                }
            }
            $i++;
        }
        return $encontrado; //retorna true si se encontró ese vagon para poner a la gente, false si no se encontró ninguno
    }

    /**
     * método que recibe por parámetro un objeto vagón y lo incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito y falso en caso contrario.
     */
    public function incorporarVagonFormacion($objVagon)
    {
        //tengo que fijarme que no se exceda la cantidad maxima de vagones?
        $coleccionVagones = $this->getArrayVagones(); //guardo la coleccion de vagones
        $cantidadVagones = count($coleccionVagones); //guardo la cantidad de vagones
        $maximoVagones = $this->getMaximoVagonesContenidos(); //guardo la cantidad maxima de vagones que admite la formacion
        $incorporado = false; //valor por defecto
        if (($cantidadVagones+1) <= $maximoVagones){ //esto lo hago para saber si el maximo vagones soportaria que se agregue un vagon más o ya se excede la cantidad, si soporta, hago:
            array_push($coleccionVagones, $objVagon); //agrego ese vagon a la conleccion de vagones de la formacion
            $this->setArrayVagones($coleccionVagones); //seteo el array con el nuevo arrglo
            $incorporado = true;
        }
        return $incorporado; //retorna un boolean
    }

    /**
     * método el cual recorre la colección de vagones y retorna un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
    */
    public function promedioPasajeroFormacion(){
        $coleccionVagones = $this->getArrayVagones(); //guardo la coleccion de vagones
        $cantidadVagones = count($coleccionVagones); //guardo la cantidad de vagones
        $contadorVagonPasajeros = 0; //esto es para llevar un contador solo de los vagones de pasajeros
        $suma = 0;
        $promedio = 0; 
        $i = 0;
        while ($i < $cantidadVagones) {
            $objVagon = $coleccionVagones[$i]; //recupero un obj vagon en especifico
            if (is_a($objVagon, 'Vagon_Pasajeros')) { //suponiendo que funciona, busco solo a los de la clase vagon_pasajeros
                $pasajerosXVagon = $objVagon->getCantidadPasajerosTransporta(); //recupero la cantidad de pasajeros q transporta ese vagon
                $suma = $suma + $pasajerosXVagon; //voy sumando la cantidad de pasajeros
                $contadorVagonPasajeros++;
            }
            $i++;
        }
        if($contadorVagonPasajeros > 0){//para verificar la division x cero
            $promedio = $suma / $contadorVagonPasajeros; 
        }
        return $promedio; //devuelve el valor del promedio
    }

    /**
     *método el cual retorna el peso de la formación completa.
    */
    public function pesoFormacion(){
        //?????????????????????????????????
        $objLocomotora = $this->getObjetoLocomotora(); //guardo el objeto locomotora
        $pesoLocomotora = $objLocomotora->getPesoLocomotora(); //recupero el peso de la locomotora
        $coleccionVagones = $this->getArrayVagones(); //guardo la col de vagones
        $pesoTotal = 0; //esto funciona como acumulador de suma

        foreach ($coleccionVagones as $objVagon) {
            $pesoVagon = $objVagon->calcularPesoVagon();
            $pesoTotal = $pesoTotal + $pesoLocomotora + $pesoVagon;
        }
        return $pesoTotal;
    }

    /**
     * método el cual retorna el primer vagón de la formación que aún no se encuentra completo
    */
    public function retornarVagonSinCompletar(){
        $coleccionVagones = $this->getArrayVagones(); //guardo la coleccion de vagones
        $cantidadVagones = count($coleccionVagones); //guardo la cantidad de vagones
        $i = 0;
        $encontrado = false; //bandera en falso por defecto
        $vagonIncompleto = null; //valor en null por defecto
        while (($i < $cantidadVagones) && !$encontrado) {
            $objVagon = $coleccionVagones[$i]; //recupero un obj vagon en especifico
            if (is_a($objVagon, 'Vagon_Pasajeros')) { //suponiendo que funciona, busco solo a los de la clase vagon_pasajeros
                $cantidadMaxPasajeros = $objVagon->getCantidadMaximaPasajeros(); //guardo la cantidad max de pasajeros
                $cantidadActualPasajeros = $objVagon->getCantidadPasajerosTransporta(); //cantidad actual de los pasajeros
                if ($cantidadActualPasajeros < $cantidadMaxPasajeros){ //o sea que no se llegó a la cantidad max
                    $encontrado = true; //cambio la bandera
                    $vagonIncompleto = $objVagon; //esto lo voy a retornar
                }
            }
            $i++;
        }
        return $vagonIncompleto; //devuelve la referencia al obj vagon que esta incompleto, o null porque no se encontró
    }
}
