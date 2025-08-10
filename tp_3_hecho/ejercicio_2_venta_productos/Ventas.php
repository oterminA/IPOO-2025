<?php
class Ventas{
    //atributos (variables instancia)
    private $fechaVenta;
    private $arrayProductosVendidos;//ref clase producto
    private $objetoCliente; //ref clase cliente

    //metodo constructor
    public function __construct($fecha, $productosVendidos, $objCliente)
    {
        $this->fechaVenta=$fecha;
        $this->arrayProductosVendidos=$productosVendidos; 
        $this->objetoCliente=$objCliente;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getFechaVenta(){
        return $this->fechaVenta;
    }
    public function getArrayProductosVendidos(){
        return $this->arrayProductosVendidos;
    }
    public function getObjetoCliente(){
        return $this->objetoCliente;
    }

    //set
    public function setFechaVenta($fecha){
        $this->fechaVenta=$fecha;
    }
    public function setArrayProductosVendidos($productosVendidos){
        $this->arrayProductosVendidos=$productosVendidos;
    }
    public function setObjetoCliente($objCliente){
        $this->objetoCliente=$objCliente;
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
        "Fecha venta: " . $this->getFechaVenta() . "\n". 
        "Coleccion de productos vendidos----\n" . $this->recorrerLosArreglos($this->getArrayProductosVendidos()) . "\n". 
        "Cliente: " . $this->getObjetoCliente() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * El importe final de una venta normal se calcula en base a la cantidad de productos, por el importe del producto.
    */
    public function importeFinalVenta(){
        $colProductos = $this->getArrayProductosVendidos();
        $cantProductos = count($colProductos); //cantidad de los productos del arreglo
        $i=0;
        $calculo = -1;
        while($i<$cantProductos){
            $objProducto = $colProductos[$i];
            $importeProducto = $objProducto->darPrecioVenta(); //recupero el precio del producto
            $calculo = $cantProductos * $importeProducto;
            $i++;
        }
        return $calculo; //retorno el importe final o -1 que significa q no se pudo calcular 
    }
}