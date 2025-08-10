6<?php
/*El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del día del paquete, por la cantidad de personas de la venta. Si se trata de una venta On- Line al importe de la venta se aplica el porcentaje de descuento cuyo valor por defecto es de un 20% (este valor puede variar). */
class Online extends Ventas{
    //atributos (variables instancia)
    private $porcentajeDescuento;

    //metodo constructor
    public function __construct($fecha, $objPaquete, $cantPersonas, $clienteVenta)
    { //pongo los atributos del contructor de ambas clases (pero en este caso particular, no va el porcentaje de descuento porque es un valor por defecto)
        parent::__construct($fecha, $objPaquete, $cantPersonas, $clienteVenta);
        $this->porcentajeDescuento = (0.2); //lo pongo ya en decimal
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    //set
    public function setPorcentajeDescuento($porcentajeDescuento){
        $this->porcentajeDescuento=$porcentajeDescuento;
    }


    //redefinicion metodo __toString()
    public function __toString(){
        $mensaje = 
        parent::__toString(). 
        "\n Porcentaje de descuento: " . $this->getPorcentajeDescuento() ;
        return $mensaje;
    }

    //metodos nuevos
    /**
     * metodo polimorfico
     * redefinicion del metodo darImporteVenta() ya que le añado el porcentaje de descuento
    */
    public function darImporteVenta(){
        $importePadre = parent::darImporteVenta(); //recupero yguardo el valor float o int de este metodo
        $importe = ($importePadre - ($importePadre * $this->getPorcentajeDescuento())); //ejemplo: (1000-(1000 * 0,2))=800 -> ese es el valor que quedaria con el decuento aplicado
        return $importe;
    }
}
?>