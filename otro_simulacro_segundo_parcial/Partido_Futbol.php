<?php
class Partido_Futbol extends Partido
{
    private $coeficienteMenores;
    private $coeficienteJuveniles;
    private $coeficienteMayores;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $objEquipo2)
    {
        $this->coeficienteMenores = 0.13;
        $this->coeficienteJuveniles = 0.19;
        $this->coeficienteMayores = 0.27;
        parent::__construct($idpartido, $fecha, $objEquipo1, $objEquipo2);
    }

    //get
    public function getCoeficienteMenores()
    {
        return $this->coeficienteMenores;
    }
    public function getCoeficienteJuveniles()
    {
        return $this->coeficienteJuveniles;
    }
    public function getCoeficienteMayores()
    {
        return $this->coeficienteMenores;
    }

    //set
    public function setCoeficienteMenores($coeficienteMenores)
    {
        $this->coeficienteMenores = $coeficienteMenores;
    }
    public function setCoeficienteJuveniles($coeficienteJuveniles)
    {
        $this->coeficienteJuveniles = $coeficienteJuveniles;
    }
    public function setCoeficienteMayores($coeficienteMayores)
    {
        $this->coeficienteMayores = $coeficienteMayores;
    }

    public function __toString()
    {
        //string
        $mensaje =
            parent::__toString() . "\n" .
            "Coeficiente menores: " . $this->getCoeficienteMenores() .
            "Coeficiente juveniles: " . $this->getCoeficienteJuveniles() .
            "Coeficiente mayores: " . $this->getCoeficienteMayores();
        return $mensaje;
    }

    /**
     * método el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho método según corresponda.
     * En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5  y es aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir:
        coef =  0,5 * cantGoles * cantJugadores  
        donde cantGoles : es la cantidad de goles;   
        cantJugadores : es la cantidad de jugadores.
     */
    public function coeficientePartido()
    {
        $coeficientePadre = parent::coeficientePartido(); //para qué hago esto? de que me sirve poner esta sentencia si el resultado de ese metodo no es el que necesito yo porque en mi redefinicion estoy usando otro tipo de coeficiente
        $menores= $this->getCoeficienteMenores();
        $juveniles= $this->getCoeficienteJuveniles();
        $mayores= $this->getCoeficienteMayores();

        $sumaCoef= $menores+$juveniles+$mayores; //sumo todos los coeficientes
        
        $coeficienteTotal = $coeficientePadre + $sumaCoef; //o sea a la cantidad que da en la clase padre, le sumo la sumatoria de coeficientes de la clase hija
        return $coeficienteTotal;
    }
}
