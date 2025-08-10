<?php
class Linea
{
    //atributos (variables instancia)
    private $pA; //punto 1, x
    private $pB; //punto 1, y
    private $pC; //punto 2, x
    private $pD; //punto 2, y


    //metodo constructor
    public function __construct($pA, $pB, $pC, $pD)
    {
        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPA()
    {
        return $this->pA;
    }
    public function getPB()
    {
        return $this->pB;
    }
    public function getPC()
    {
        return $this->pC;
    }
    public function getPD()
    {
        return $this->pD;
    }

    //set
    public function setPA($pA)
    {
        $this->pA = $pA;
    }
    public function setPB($pB)
    {
        $this->pB = $pB;
    }
    public function setPC($pC)
    {
        $this->pC = $pC;
    }
    public function setPD($pD)
    {
        $this->pD = $pD;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Punto 1: (" . $this->getPA() . ", " . $this->getPB() . "). \n" .
            "Punto 2: (" . $this->getPC() . ", " . $this->getPD() . ").\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     *  Desplaza la línea a la derecha la distancia(d) que se recibe por parámetro.
     */
    public function mueveDerecha($distancia)
    {
        /*-Nuevo punto 1: (pA + d)
        -Nuevo punto 2: (pD + d)
        -porque pA y pD son x, y la x se mueve a la derecha (por lo q tengo que sumar)*/
        $a = $this->getPA();
        $c= $this->getPC();

        //seteo los valores ya movidos a la derecha
        $this->setPA($a + $distancia);
        $this->setPC($c + $distancia);
    }

    /**
     *  Desplaza la línea a la izquierda la distancia(d) que se recibe por parámetro.
     */
    public function mueveIzquierda($distancia)
    {
        /* -Nuevo punto 1: (pA - d)
        -Nuevo punto 2: (pD - d)
        -porque pA y pD son x, y la x se mueve a la izquierda (por eso resto)*/
        $a = $this->getPA();
        $c = $this->getPC();

        //seteo los valores ya movidos a la derecha
        $this->setPA($a - $distancia);
        $this->setPD($c - $distancia);
    }

    /**
     * Desplaza la línea hacia arriba la distancia que se recibe por parámetro.
     */
    public function  mueveArriba($distancia)
    {
        /*-seria el punto 1 (pA, pB) y el punto 2(pC, pD)
    -Nuevo punto 1: (pB + d)
    -Nuevo punto 2: (pC + d)
    -porque pB y pC son y, y la y se mueve arriba (por lo q tengo que sumar)*/
    $b = $this->getPB();
    $d = $this->getPD();

    //seteo los valores ya movidos 
    $this->setPB($b + $distancia);
    $this->setPD($d + $distancia);
    }

    /**
     *   Desplaza la línea hacia abajo la distancia que se recibe por parámetro.
     */
    public function mueveAbajo($distancia)
    {
        /*-seria el punto 1 (pA, pB) y el punto 2(pC, pD)
    -Nuevo punto 1: (pB - d)
    -Nuevo punto 2: (pC - d)
    -porque pB y pC son y, y la y se mueve arriba (por lo q tengo que sumar)*/
    $b = $this->getPB();
    $d = $this->getPD();

    //seteo los valores ya movidos 
    $this->setPB($b - $distancia);
    $this->setPD($d - $distancia);
    }
}
