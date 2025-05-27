<?php
class Torneo
{
    //atributos (variables instancia)
    private $arrayPartidos;
    private $importePremio;

    //metodo constructor
    public function __construct($premio)
    {
        $this->arrayPartidos = [];
        $this->importePremio = $premio;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayPartidos()
    {
        return $this->arrayPartidos;
    }
    public function getImportePremio()
    {
        return $this->importePremio;
    }

    //set
    public function setArrayPartidos($arrayPartidos)
    {
        $this->arrayPartidos = $arrayPartidos;
    }
    public function setImportePremio($premio)
    {
        $this->importePremio = $premio;
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
            "Coleccion de partidos----\n " . $this->recorrerLosArreglos($this->getArrayPartidos())  . "\n" .
            "Importe premio: $" . $this->getImportePremio() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.  
     */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    {
        //categoria es igual a tipo??
        //torneo->partido->equipo:cant jugadores, obj categoria
        $coleccionPartido = $this->getArrayPartidos(); //guardo la coleccion de partidos
        $nuevoPartido = null; //valor por defecto
        //chequear la cant de jugadores, misma categoria
        $catE1 = $OBJEquipo1->getObjCategoria()->getidcategoria(); //guardo la categoria (tipo?) del equipo1
        $catE2 = $OBJEquipo2->getObjCategoria()->getidcategoria(); //guardo la categoria (tipo?) del equipo2
        $jugE1 = $OBJEquipo1->getCantJugadores(); //guardo la cantidad de jugadores de eq1
        $jugE2 = $OBJEquipo2->getCantJugadores(); //guardo la cantidad de jugadores de eq2

        if (($catE1 == $catE2) && (($jugE1 == $jugE2))) {
            if ($tipoPartido === "futbol") {
                $nuevoPartido = new Partido_Futbol(null, $fecha, $OBJEquipo1, $OBJEquipo2);
                array_push($coleccionPartido, $nuevoPartido);
                $this->setArrayPartidos($coleccionPartido); //seteo el arreglo de partidos con la coleccion actualizada
            } else {
                $nuevoPartido = new Partido_Basquet(null, $fecha, $OBJEquipo1, $OBJEquipo2);
                array_push($coleccionPartido, $nuevoPartido);
                $this->setArrayPartidos($coleccionPartido); //seteo el arreglo de partidos con la coleccion actualizada
            }
        }
        return $nuevoPartido; //se retorna la instancia del partido que corresponde, o null en caso de que no coincida nada
    }

    /**
     * método que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en  base  al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
     */
    public function  darGanadores($deporte)
    {
        //de torneo ->partido->equipo->categoria: deporte o tipo de categoria
        $coleccionPartidos = $this->getArrayPartidos(); //guardo el arreglo de partidos
        $coleccionGanadores = []; //en vacio

        //segun lo que dice el enunciado no logro entender si tengo que hacer recorrido parcial o exhaustivo
        foreach ($coleccionPartidos as $objPartido) {
            $objE1 = $objPartido->getObjEquipo1(); //recupero un obj equipo1
            $objE2 = $objPartido->getObjEquipo2(); //recupero un obj equipo2
            $categoria = $objE1->getObjCategoria()->getidcategoria(); //guardo la categoria de solo un equipo xq si estan en el mismo obj partido significa que tienen la misma categoria

            if ($categoria == $deporte) {
                $ganador = $objPartido->darEquipoGanador(); //llamo al metodo que elige cuál es el equipo ganador
                switch ($ganador) {
                    case '1':
                        array_push($coleccionGanadores, $objE1); //a la coleccion de ganadores meto el equipo 1
                        break;
                    case '2':
                        array_push($coleccionGanadores, $objE2); //a la coleccion de ganadores meto el equipo 2
                        break;
                }
            }
        }
        return $coleccionGanadores; //devuelve la coleccion con elementos o vacia porque no ganó ninguno
    }

    /**
     * método que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’  y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo: (premioPartido = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($OBJPartido)
    {
        $ganador = $OBJPartido->darEquipoGanador(); //llamo al metodo que elige cuál es el equipo ganador
        $premioPartido = ($OBJPartido->coeficientePartido()) * ($this->getImportePremio()); //formula del enunciado
        $coleccionEquipoGanador = [];
        switch ($ganador) {
            case '1':
                $objE1 = $OBJPartido->getObjEquipo1(); //recupero un obj equipo1
                array_push($coleccionGanadores, $objE1); //a la coleccion de ganadores meto el equipo 1
                $coleccionEquipoGanador =
                    [
                        "equipoGanador" => $objE1,
                        "premioPartido" => $premioPartido
                    ];
                break;
            case '2':
                $objE2 = $OBJPartido->getObjEquipo2(); //recupero un obj equipo2
                array_push($coleccionGanadores, $objE2); //a la coleccion de ganadores meto el equipo 2
                $coleccionEquipoGanador =
                    [
                        "equipoGanador" => $objE2,
                        "premioPartido" => $premioPartido
                    ];
                break;
        }
        return $coleccionEquipoGanador; //retorna la coleccion como lo pide el enunciado, o el arreglo vacio porque ninguno ganó o hubo un problema con la implementacion
    }
}
