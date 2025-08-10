<?php
class Cuadrado{
    //atributos (variables instancia)
    private $verticeA; //inf izq
    private $verticeB;// inf der
    private $verticeC;//sup izq
    private $verticeD;//sup der


    //metodo constructor
    public function __construct($vA, $vB, $vC, $vD)
    {
        $this->verticeA=$vA; 
        $this->verticeB=$vB;   
        $this->verticeC=$vC;   
        $this->verticeD=$vD;   

    }

    //metodos de accedo: getters  y setters
    //get
    public function getVerticeA(){
        return $this->verticeA;
    }
    public function getVerticeB(){
        return $this->verticeB;
    }
    public function getVerticeC(){
        return $this->verticeC;
    }
    public function getVerticeD(){
        return $this->verticeD;
    }

    //set
    public function setVerticeA($vA){
        $this->verticeA=$vA;
    }
    public function setVerticeB($vB){
        $this->verticeB=$vB;
    }
    public function setVerticeC($vC){
        $this->verticeC=$vC;
    }
    public function setVerticeD($vD){
        $this->verticeD=$vD;
    }

    /**
    * funcion para poder recorrer losvertices y asi mostralos en el toString  
    */
    public function mostrarVertice($v)
{
    $mensaje = "X= " . $v["x"] . ", Y= " . $v["y"];
    return $mensaje;
}

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Vertice A----\n " . $this->mostrarVertice($this->getVerticeA()) . "\n". 
        "Vertice B----\n " . $this->mostrarVertice($this->getVerticeB()) . "\n". 
        "Vertice C----\n " . $this->mostrarVertice($this->getVerticeC()) . "\n". 
        "Vertice D----\n " . $this->mostrarVertice($this->getVerticeD()) . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método que calcula el área del cuadrado.
    */
    public function area(){
        //el area se calcula haciendo lado*lado
        //el lado lo obtengo haciendo √((x2 - x1)² + (y2 - y1)²)
        $a = $this->getVerticeA();
        $b = $this->getVerticeB();

        $xA = $a["x"];
        $yA = $a["y"];
        $xB = $b["x"];
        $yB = $b["y"];

        $ladoTotal = sqrt(pow($xB - $xA, 2) + pow($yB - $yA, 2)); 
        $area = $ladoTotal * $ladoTotal;
        return $area;
    }

    /**
     * método que recibe por parámetro el tamaño que debe aumentar el cuadrado
    */
    public function aumentarTamanio($tamanio){
        //creo que tengo que multiplicar los vertices por el escalar que viene por parametro
        $vA = $this->getVerticeA();
        $vB = $this->getVerticeB();
        $vC = $this->getVerticeC();
        $vD = $this->getVerticeD();

        //saco cada coordenada de cada vertice, para hacerlo mas ordenado, aunque pude haberlo hecho todo en una misma linea
        $xA = $vA["x"];
        $yA = $vA["y"];
        $xB = $vB["x"];
        $yB = $vB["y"];
        $xC = $vC["x"];
        $yC = $vC["y"];
        $xD = $vD["x"];
        $yD = $vD["y"];

        //ahora a cada y seteo los nuevos valores
        $aumentadoA = $this->setVerticeA(["x" => $tamanio * $xA, "y" => $tamanio * $yA]);
        $aumentadoB = $this->setVerticeB(["x" => $tamanio * $xB, "y" => $tamanio * $yB]);
        $aumentadoC = $this->setVerticeC(["x" => $tamanio * $xC, "y" => $tamanio * $yC]);
        $aumentadoD = $this->setVerticeD(["x" => $tamanio * $xD, "y" => $tamanio * $yD]);
    }
}