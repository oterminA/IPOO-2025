<?php
class Planes{
    //atributos (variables instancia)
    private $codigoPlan;
    private $arrayCanalesOfrece; //es un array?
    private $incluyeONoMG;
    private $importe;

    //metodo constructor
    public function __construct($codigo, $arregloCanales, $importe)
    {
        $this->codigoPlan=$codigo;
        $this->arrayCanalesOfrece=$arregloCanales;
        $this->incluyeONoMG=100;   
        $this->importe=$importe;

    }

    //metodos de accedo: getters  y setters
    //get
    public function getCodigoPlan(){
        return $this->codigoPlan;
    }
    public function getArrayCanalesOfrece(){
        return $this->arrayCanalesOfrece;
    }
    public function getIncluyeONoMG(){
        return $this->incluyeONoMG;
    }
    public function getImporte(){
        return $this->importe;
    }

    //set
    public function setCodigoPlan($codigo){
        $this->codigoPlan=$codigo;
    }
    public function setArrayanalesOfrece($arregloCanales){
        $this->arrayCanalesOfrece=$arregloCanales;
    }
    public function setIncluyeONoMG($incluyeMG){
        $this->incluyeONoMG=$incluyeMG;
    }
    public function setImporte($importe){
        $this->importe=$importe;
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
                $mensaje = $mensaje . "Elemento N°". $i+1 . ": ". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Codigo del plan: " . $this->getCodigoPlan() . "\n".
        "Canales que ofrece: " . $this->recorrerLosArreglos($this->getArrayCanalesOfrece()). "\n".
        "Incluye o no MG: " . ($this->getIncluyeONoMG() <> null) ? "Incluye MG. \n" : "No incluye MG. \n"; 
        "Importe: $" . $this->getImporte() . "\n";
        return $mensaje;

        
    }

    //metodos nuevos


}