<?php
class Partido_Basquet extends Partido
{
    private $coeficientePenalizacion;
    private $cantidadInfracciones;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $objEquipo2,)
    {
        $this->coeficientePenalizacion = 0.75;
        $this->cantidadInfracciones = 0; //porque recien se crea el objeto?
        parent::__construct($idpartido, $fecha, $objEquipo1, $objEquipo2);
    }

    //get
    public function getCoeficientePenalizacion(){
        return $this->coeficientePenalizacion;
    }
    public function getCantidadInfracciones(){
        return $this->cantidadInfracciones;
    }

    //set
    public function setCantidadInfracciones($infracciones){
        $this->cantidadInfracciones=$infracciones;
    }
    public function setCoeficientePenalizacion($penalizacion){
        $this->coeficientePenalizacion=$penalizacion;
    }


    public function __toString()
    {
        //string 
        $mensaje = 
        parent::__toString() . "\n" .
        "Coeficiente penalizacion: " . $this->getCoeficientePenalizacion() . "\n". 
        "Cantidad de infracciones: " . $this->getCantidadInfracciones() . "\n";
        return $mensaje;
    }

    //metodos nuevos
      /**
     * método el cual retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho método según corresponda.
     * Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. 
     * Es decir:
        coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
    */
    public function coeficientePartido()
    {
        $coeficientePadre = parent::coeficientePartido(); //para qué hago esto? de que me sirve poner esta sentencia si el resultado de ese metodo no es el que necesito yo porque en mi redefinicion estoy usando otro tipo de coeficiente. En una redefinicion total tengo que poner esa linea?
        $coefBase = $this->getCoefBase();
        $penalizacion = $this->getCoeficientePenalizacion();//guardo el coeficiente de penalizacion
        $infracciones = $this->getCantidadInfracciones();//guardo la cantidad de infracciones
        $coeficienteTotal = $coefBase - ($penalizacion*$infracciones); //formula del enunciado
       
        return $coeficienteTotal;
    }
}
