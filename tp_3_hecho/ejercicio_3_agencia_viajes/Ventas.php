<?php
/*De las Ventas se almacena la fecha, la referencia al paquete, la cantidad de personas, y el cliente al que se le ha realizado la venta. Por otro lado hay ventas On-Line, de estas ventas se almacena el porcentaje de descuento y tienen un cálculo de venta diferente. 
El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del día del paquete, por la cantidad de personas de la venta. Si se trata de una venta On- Line al importe de la venta se aplica el porcentaje de descuento cuyo valor por defecto es de un 20% (este valor puede variar). Definir la jerarquía de clases junto a los métodos y variables instancias de cada una de ellas. No olvidar realizar el diagrama de clases*/
class Ventas{
    //atributos (variables instancia)
    private $fechaVenta;
    private $objetoPaquete; //referencia a clase Paquetes_Turisticos
    private $cantidadPersonas; //asumo que son la cantidad de personas q compraron el paquete
    private $objClienteVenta; //referencia a clase Cliente

    //metodo constructor
    public function __construct($fecha, $objPaquete, $cantPersonas, $clienteVenta)
    {
        $this->fechaVenta=$fecha;
        $this->objetoPaquete=$objPaquete;
        $this->cantidadPersonas=$cantPersonas;
        $this->objClienteVenta=$clienteVenta;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getFechaVenta(){
        return $this->fechaVenta;
    }
    public function getObjetoPaquete(){
        return $this->objetoPaquete;
    }
    public function getCantidadPersonas(){
        return $this->cantidadPersonas;
    }
    public function getObjClienteVenta(){
        return $this->objClienteVenta;
    }

    //set
    public function setFechaVenta($fecha){
        $this->fechaVenta=$fecha;
    }
    public function setObjetoPaquete($objPaquete){
        $this->objetoPaquete=$objPaquete;
    }
    public function setCantidadPersonas($cantPersonas){
        $this->cantidadPersonas=$cantPersonas;
    }
    public function setObjClienteVenta($clienteVenta){
        $this->objClienteVenta=$clienteVenta;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Fecha venta: " . $this->getFechaVenta() . "\n" . 
        "Paquete turistico----\n " . $this->getObjetoPaquete() . "\n" . 
        "Cantidad de personas " . $this->getCantidadPersonas() . "\n" . 
        "Cliente al que se le realizó la venta----\n " . $this->getObjClienteVenta() . "\n" ; 
        return $mensaje;
    }

    //metodos nuevos
    /**
     * El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del día del paquete, por la cantidad de personas de la venta
     * se puede decir que el importe es lo que sale el paquete en total
    */
    public function darImporteVenta(){
        $objPaquete = $this->getObjetoPaquete(); //guardo el obj paquete
        $dias = $objPaquete->getCantidadDias(); //recupero la cantidad de dias
        $objDestino = $objPaquete->getObjetoDestino(); //recupero el obj destino 
        $valorXDia = $objDestino->getValorPorDia(); //recupero el valor por dia de la clase Destino
        $cantPersonas = $this->getCantidadPersonas(); //guardo la cantidad de personas
        $final = (($dias * $valorXDia) * $cantPersonas);
        return $final; //devuelve un entero o un float
    }
}

?>