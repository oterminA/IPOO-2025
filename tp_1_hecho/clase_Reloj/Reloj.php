<?php
class Reloj
{
    //atributos (variables instancia)
    private $segundos;
    private $minutos;
    private $horas;


    //metodo constructor
    public function __construct($hor, $min, $seg)
    {
        $this->horas = $hor;
        $this->minutos = $min;
        $this->segundos = $seg;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getSegundos()
    {
        return $this->segundos;
    }
    public function getMinutos()
    {
        return $this->minutos;
    }
    public function getHoras()
    {
        return $this->horas;
    }

    //set
    public function setSegundos($seg)
    {
        $this->segundos = $seg;
    }
    public function setMinutos($min)
    {
        $this->minutos = $min;
    }
    public function setHoras($hor)
    {
        $this->horas = $hor;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Reloj " . $this->getHoras() . ":" .  $this->getMinutos() . ":" . $this->getSegundos() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * la funcion hace la puesta a cero del reloj, deja todo en cero
     */
    public function puesta_a_cero()
    {
        $this->setSegundos(00);
        $this->setMinutos(00);
        $this->setHoras(00);
    }

    /**
     * la funcion es el comportamiento incremental del reloj
     */
    public function incremento()
    {
        //llamo a las variables
        $s = $this->getSegundos();
        $m = $this->getMinutos();
        $h = $this->getHoras();

        $s++; //aumento los segundos

        if ($s == 60) { //si los segundos son iguales a 60 los dejo en cero y aumetno los minuots
            $s = 0;
            $m++;
        }

        if ($m == 60) { //si los minutos son iguales a 60, dejo en cero y aumento las horas
            $m = 0;
            $h++;
        }

        if ($h == 24) { //si las horas son iguales a 24, dejo en cero 
            $h = 0;
        }
        $this->setSegundos($s); //y seteo los valores
        $this->setMinutos($m);
        $this->setHoras($h);
    }
}
