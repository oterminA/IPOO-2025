<?php
class Productos_Regionales extends Producto{
    //atributos (variables instancia)
    private $porcentajeDescuento;

    //metodo constructor
    public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro, $descuento)
    {
        parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro);
        $this->porcentajeDescuento=$descuento;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    //set
    public function setPorcentajeDescuento($descuento){
        $this->porcentajeDescuento=$descuento;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() . 
        "Porcentaje de descuento " . $this->getPorcentajeDescuento() . "%\n"; 
        return $mensaje;
    }

    //metodos nuevos

    /**
     * Implementar un método darPrecioVenta() que retorna el precio de venta de un producto y redefinirlo cuando sea necesario
     * El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base a su rubro, más el porcentaje de IVA que se aplica al producto.
     *  Si son regionales se almacena un porcentaje de descuento que será aplicado al precio de venta.
    */
    public function darPrecioVenta(){
        $importePadre = parent::darPrecioVenta();//traigo a esta clase el metodo ya definido en la clase padre y guardo el valor?
        $dtoDecimal = $this-> getPorcentajeDescuento() / 100; //guardo el descuento
        $importe  = $importePadre - ($importePadre * $dtoDecimal); //hago la operacion
        return $importe; //precio que genera la clase padre - el descuento que aporta esta clase
    }
}
?>