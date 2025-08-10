<?php
class Fecha
{
    //atributos (variables instancia)
    private $dia;
    private $mes;
    private $anio;


    //metodo constructor
    public function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getDia()
    {
        return $this->dia;
    }
    public function getMes()
    {
        return $this->mes;
    }
    public function getAnio()
    {
        return $this->anio;
    }

    //set
    public function setDia($dia)
    {
        $this->dia = $dia;
    }
    public function setMes($mes)
    {
        $this->mes = $mes;
    }
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    /**
     * funcion para los meses
     */
    public function meses()
    {
        $mes = $this->getMes();
        switch ($mes) {
            case '1':
                $mesCompleto = "enero";
                break;
            case '2':
                $mesCompleto = "febrero";
                break;
            case '3':
                $mesCompleto = "marzo";
                break;
            case '4':
                $mesCompleto = "abril";
                break;
            case '5':
                $mesCompleto = "mayo";
                break;
            case '6':
                $mesCompleto = "junio";
                break;
            case '7':
                $mesCompleto = "julio";
                break;
            case '8':
                $mesCompleto = "agosto";
                break;
            case '9':
                $mesCompleto = "septiembre";
                break;
            case '10':
                $mesCompleto = "octubre";
                break;
            case '11':
                $mesCompleto = "noviembre";
                break;
            case '12':
                $mesCompleto = "diciembre";
                break;
        }
        return $mesCompleto;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Fecha abreviada: " . $this->getDia() . "/" . $this->getMes() . "/" . $this->getAnio() . "\n" .
            "Fecha completa: " . $this->getDia() . " de " . $this->meses() . " de " . $this->getAnio() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * Implementar una función incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero
     */
    public function incremento($cantidadDias, $fechaVieja)
    {
        //obtengo cada parte de la fecha
        $partesFecha = explode("/", $fechaVieja); // separa en un array
        $dia =(int)$partesFecha[0];  // dia en num
        $mes  = (int)$partesFecha[1];  // mes en num
        $anio  = (int)$partesFecha[2];  // anio en num

        //hago un array que almacene la cantidad de dias que tiene cada mes
        $meses = [];
        $meses = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; //enero, febrero, marzo y asi

        //ahora tendria que hacer la parte de calcular si es bisiesto
        if (($anio % 4 === 0 && $anio % 100 !== 0) || ($anio % 400 === 0)) {
            $meses[1] = 29; //si es bisiesto, el mes de febrero(indice 1) pasa a tener 29 dias
        }

        //hago lo de esta funcion: incrementar la fecha por la cantidad de dias que dan
        if (($dia + $cantidadDias) > $meses[$mes - 1]) { //o sea si la suma del entero + los dias de la fecha exceden la cantidad de dias de ese mes
            $diasXMes = $meses[$mes - 1]; //me quedo con la cantidad de dias que tiene ese mes
            $diferencia = ($dia + $cantidadDias) - $diasXMes; //acá saco lo que sobra de los dias de ese mes, que serian los que pertenecen al mes siguiente
            $this->setDia($diferencia); //seteo el dia actual
            $this->setMes($mes+1);
            if ($mes + 1 >12) { //es decir, si el mes siguiente es mayor a 12
                $this->setMes(01); //o sea se empieza otra vez con los meses(porque si se entró por la alternativa es porque el mes es el siguiente))
                $this->setAnio($anio + 1); //aumento un año
            }
        }else{
            $this->setDia($dia+ $cantidadDias);
            $this->setMes($mes);
            $this->setAnio($anio);
        }
        $fechaNueva = $this->getDia() ."/" . $this->getMes() ."/" .$this->getAnio(); //puedo hacer esto???
        return $fechaNueva;
    }
    
}
