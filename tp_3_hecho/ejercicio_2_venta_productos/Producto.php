<?php
class Producto{
    //atributos (variables instancia)
    private $codigoBarraProducto;
    private $descripcionProducto;
    private $stockProducto;
    private $porcentajeIva;
    private $precioCompraProducto;
    private $objetoRubroPertenece;// referencia a la clase Rubro

    //metodo constructor
    public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro)
    {
        $this->codigoBarraProducto=$codigoBarra;
        $this->descripcionProducto=$descripcion;
        $this->stockProducto=$stock;
        $this->porcentajeIva= $iva;
        $this->precioCompraProducto=$precioCompra;
        $this->objetoRubroPertenece=$objRubro;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getCodigoBarraProducto(){
        return $this->codigoBarraProducto;
    }
    public function getDescripcionProducto(){
        return $this->descripcionProducto;
    }
    public function getStockProducto(){
        return $this->stockProducto;
    }
    public function getPorcentajeIva(){
        return $this->porcentajeIva;
    }
    public function getPrecioCompraProducto(){
        return $this->precioCompraProducto;
    }
    public function getObjetoRubroPertenece(){
        return $this->objetoRubroPertenece;
    }


    //set
    public function setCodigoBarraProducto($codigoBarra){
        $this->codigoBarraProducto=$codigoBarra;
    }
    public function setDescripcionProducto($descripcion){
        $this->descripcionProducto=$descripcion;
    }
    public function setStockProducto($stock){
        $this->stockProducto=$stock;
    }
    public function setPorcentajeIva($iva){
        $this->porcentajeIva=$iva;
    }
    public function setObjetoRubroPertenece($objRubro){
        $this->objetoRubroPertenece=$objRubro;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Codigo de barra del producto: " . $this->getCodigoBarraProducto() . "\n". 
        "Descripcion: " . $this->getDescripcionProducto() . "\n". 
        "Stock del producto: " . $this->getStockProducto() . "\n". 
        "Precio compra: $" . $this->getPrecioCompraProducto(). "\n";
        "Porcentaje de iva: " . $this->getPorcentajeIva() . "\n". 
        "Referencia del rubro al que pertenece----\n " . $this->getObjetoRubroPertenece() . "\n"; 
        return $mensaje;
    }

    //metodos nuevos

    /**
     * Implementar un método que retorna el precio de venta de un producto y redefinirlo cuando sea necesario
     * El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base a su rubro, más el porcentaje de IVA que se aplica al producto.
    */
    public function darPrecioVenta() {
        $precioCompra = $this->getPrecioCompraProducto();
        $ganancia = $this->getObjetoRubroPertenece()->getPorcentajeGananciaAplicado();
        $iva = $this->getPorcentajeIva();
        $precioFinal = -1;
    
        $precioConGanancia = $precioCompra + ($precioCompra * ($ganancia / 100));
        $precioFinal = $precioConGanancia + ($precioConGanancia * ($iva / 100));
    
        return $precioFinal;//precio final o -1
    }
    
}
?>