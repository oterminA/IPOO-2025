<?php
class Partido
{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $objEquipo2)
    {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = 0; //cero porque está recien creado el objeto (?)
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = 0;
        $this->coefBase = 0.5;
    }

    //OBSERVADORES
    public function setidpartido($idpartido)
    {
        $this->idpartido = $idpartido;
    }

    public function getIdpartido()
    {
        return $this->idpartido;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }



    public function setObjEquipo1($objEquipo1)
    {
        $this->objEquipo1 = $objEquipo1;
    }
    public function getObjEquipo1()
    {
        return $this->objEquipo1;
    }


    public function setObjEquipo2($objEquipo2)
    {
        $this->objEquipo2 = $objEquipo2;
    }
    public function getObjEquipo2()
    {
        return $this->objEquipo2;
    }

    public function setCoefBase($coefBase)
    {
        $this->coefBase = $coefBase;
    }
    public function getCoefBase()
    {
        return $this->coefBase;
    }


    public function __toString()
    {
        //string $cadena
        $cadena = "idpartido: " . $this->getIdpartido() . "\n";
        $cadena = $cadena . "Fecha: " . $this->getFecha() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 1> " . "\n" . $this->getObjEquipo1() . "\n";
        $cadena = $cadena . "Cantidad Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 2> " . "\n" . $this->getObjEquipo2() . "\n";
        $cadena = $cadena . "Cantidad Goles E2: " . $this->getCantGolesE2() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        return $cadena;
    }

    //metodos nuevos
    /**
     *  método que retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.
    */
    public function darEquipoGanador(){
        $golesE1 = $this->getCantGolesE1(); //guardo los goles del eq.1
        $golesE2 = $this->getCantGolesE2(); //guardo los goles del eq.2
        $equipoGanador = 0;

        if ($golesE1 > $golesE2){
            $equipoGanador = 1;
        }elseif ($golesE2 > $golesE1){
            $equipoGanador = 2;
        }

        return $equipoGanador; //0=empate; 1=eq1; 2=eq2
    }

    /**
     * método el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho método según corresponda.
    */
    public function coeficientePartido(){
        $coefBase = $this->getCoefBase(); //guardo el coef base
        $objetoE1 = $this->getObjEquipo1(); //guardo el objeto equipo1
        $objetoE2 = $this->getObjEquipo2(); //guardo el objeto equipo2

        $golesE1 = $this->getObjEquipo1();
        $golesE2 = $this->getObjEquipo2();
        $totalGoles = $golesE1 + $golesE2; //sumo la cantidad de goles

        $jugadoresE1 = $objetoE1-> getCantJugadores(); //recupero la cantidad de jugadores de ese equipo
        $jugadoresE2 = $objetoE2-> getCantJugadores(); //recupero la cantidad de jugadores del equipo2
        $totalJugadores = $jugadoresE1 + $jugadoresE2; //sumo a todos los jugadores

        $coeficienteTotal = $coefBase * ($totalGoles + $totalJugadores); //formula que dice el enunciado
        return $coeficienteTotal;
    }
}
