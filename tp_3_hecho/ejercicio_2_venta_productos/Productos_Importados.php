<?php
class Productos_Importados extends Producto{
    //atributos (variables instancia)

    //metodo constructor
    public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro)
    {
        parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro);
    }

    //metodos de accedo: getters  y setters
    //get
   
    //sets


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString();
        return $mensaje;
    }

    //metodos nuevos

    /**
     * Implementar un método darPrecioVenta() que retorna el precio de venta de un producto y redefinirlo cuando sea necesario
     * El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base a su rubro, más el porcentaje de IVA que se aplica al producto.
     * Si son importados, el precio de venta se incrementa un 50 % y se agrega un impuesto del 10 % sobre el valor obtenido.
    */
    public function darPrecioVenta(){
        $importePadre = parent::darPrecioVenta(); //recupero el resultado de la clase padre
        $importeConIncremento = $importePadre * 1.5; // 50% más
        $importeConImpuesto = $importeConIncremento + ($importeConIncremento * 0.10); // 10% impuesto
        return $importeConImpuesto;
    }
}
?>