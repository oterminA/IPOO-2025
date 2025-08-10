<?php
class Local
{
    //atributos (variables instancia)
    private $arrayProductosImportados; //ref clase importados
    private $arrayProductosRegionales; //ref clase regionales
    private $arrayVentasRealizadas; ////ref clase ventas

    //metodo constructor
    public function __construct($arregloImportados, $arregloRegionales, $arregloVentas)
    {
        $this->arrayProductosImportados = $arregloImportados;
        $this->arrayProductosRegionales = $arregloRegionales;
        $this->arrayVentasRealizadas = $arregloVentas;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayProductosImportados()
    {
        return $this->arrayProductosImportados;
    }
    public function getArrayProductosRegionales()
    {
        return $this->arrayProductosRegionales;
    }
    public function getArrayVentasRealizadas()
    {
        return $this->arrayVentasRealizadas;
    }

    //set
    public function setArrayProductosImportados($arregloImportados)
    {
        $this->arrayProductosImportados = $arregloImportados;
    }
    public function setArrayProductosRegionales($arregloRegionales)
    {
        $this->arrayProductosRegionales = $arregloRegionales;
    }
    public function setArrayVentasRealizadas($arregloVentas)
    {
        $this->arrayVentasRealizadas = $arregloVentas;
    }

    /**
     * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
     */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if ($cantidadArreglo == 0) {
            $mensaje = "Arreglo sin elementos. \n";
        } else {
            for ($i = 0; $i < $cantidadArreglo; $i++) {
                $mensaje = $mensaje . "Elemento N°" . $i + 1 . ": " . $arreglo[$i] . "\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Coleccion de productos importados----\n " . $this->recorrerLosArreglos($this->getArrayProductosImportados()) . "\n" .
            "Coleccion de productos regionales----\n  " . $this->recorrerLosArreglos($this->getArrayProductosRegionales()) . "\n" .
            "Coleccion de ventas realizadas----\n" . $this->recorrerLosArreglos($this->getArrayVentasRealizadas()) . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /*
    * funcion que hace merge de los arreglos
    */
    public function coleccionProductos(){
        $colRegionales = $this->getArrayProductosRegionales();
        $colImportados = $this->getArrayProductosImportados();
        $colProductos = array_merge($colImportados, $colRegionales); //hago un merge de ambos arrays xra poder hacer una sola busqueda
        return $colProductos;
    }

    /**
     * método que recibe por parámetro un objeto Producto y verifica que el código de barra no se encuentre dentro de la lista. Si el producto ya existe no es incorporado dentro de la lista de productos de la tienda. El método retorna verdadero o falso según corresponda.
    */
    public function incorporarProductoLocal ($objProducto){
        $colProductos = $this->coleccionProductos();
        $cantProductos = count($colProductos); //cantidad productos
        $i=0;
        $existe = true;//bandera, considero que por defecto los productos existen

        while (($i<$cantProductos) && $existe){
            $unProducto = $colProductos[$i];
            $codigoUnProducto =$unProducto->getCodigoBarraProducto();
            $codigoObjProducto = $objProducto->getCodigoBarraProducto();
            if ($codigoUnProducto !== $codigoObjProducto){
                $existe = false;
                array_push($colProductos, $objProducto);
                //como seteo el arreglo si no hay una coleccion de productos per se. Entiendo que ambos tipos de productos por herencia tienen el codigo de barra, pero como sé DONDE tengo que setear ese producto? 
            }
            $i++;
        }
        return $existe; //true: el producto ya existia, false: fue agregado ahora
    }


    /**
     * método que recibe por parámetro el código de un producto y retorna el precio de venta.
    */
    public function retornarImporteProducto($codProducto){
        $colProductos = $this->coleccionProductos();
        $cantProductos = count($colProductos); //cantidad productos
        $i=0;
        $encontrado = false;

        while (($i<$cantProductos) && !$encontrado){
            $unProducto = $colProductos[$i];
            $codigo = $unProducto->getCodigoBarraProducto();
            if ($codigo == $codProducto){
                $encontrado = true;
                $precioVenta = $unProducto->darPrecioVenta();
            }
            $i++;
        }
        return $precioVenta; //-1 o el precio
    }


    /**
     *  recorre todos los productos de la tienda y retorna la suma de los costos de cada producto teniendo en cuenta el stock de cada uno
    */
    public function retornarCostoProductoLocal(){
        //tengo que recorrer el arreglo de TODOS los productos
        //de cada producto obtengo el stock, y el costo
        //en una var suma= suma + (costo*stock)
        $colProductos = $this->coleccionProductos();
        $suma = 0;
        foreach ($colProductos as $objProducto) {
            $stock = $objProducto->getStockProducto();
            $costo = $objProducto->darPrecioVenta();
            $suma = ($costo * $stock) +$suma;
        }
        return $suma;
    }


    /**
     *  método que retorna el producto más económico de un rubro. 
    */
    public function productoMasEcomomico($rubro){
        $colProductos = $this->coleccionProductos();
        $masEconomico = 99999999999999999;
        foreach ($colProductos as $objProducto) {
            $unRubro = $objProducto->getObjetoRubroPertenece();
            if ($rubro == $unRubro){
                $costo = $objProducto->darPrecioVenta();
                if ($masEconomico > $costo){
                    $masEconomico=$costo;
                }
            }
        }
        return $masEconomico;
    }


    /**
     *retorna los n productos más vendidos en el año recibido por parámetro.
     *HELP. como sé cuáles fueron los más vendidos??
    */
    public function informarProductosMasVendidos($anio, $n){
        $colVentas = $this->getArrayVentasRealizadas();
        $ventasXProducto = [];
        $colN = [];
        $i = 0;
    
        foreach ($colVentas as $producto) {
            $fecha = $producto->getFechaVenta(); 
            $partes = explode("/", $fecha);
            $anioProducto = $partes[2];
    
            if ($anio == $anioProducto) {
                $codigo = $producto->getCodigoBarraProducto()();
                if (!isset($ventasXProducto[$codigo])) {
                    $ventasXProducto[$codigo] = [
                        "producto" => $producto,
                        "cantidad" => 1
                    ];
                } else {
                    $ventasXProducto[$codigo]["cantidad"]++;
                }
            }
        }
    
        $ventasXProducto = $this->ordenarArregloDesc($ventasXProducto);
    
        $ventasXProducto = array_values($ventasXProducto); //para poder recorrer el arreglo con while porque no tiene indices numericos
    
        $total = count($ventasXProducto);
        while ($i < $n && $i < $total) {
            array_push($colN, $ventasXProducto[$i]["producto"]);
            $i++;
        }
    
        return $colN; 
    }


    /**
     *método que retorna el promedio de ventas de productos importados realizadas.
    */
    public function promedioVentasImportados(){
        //tendria q fijarme en ventas y filtrar con instanceof si el objeto del momento pertenece a los productos importados
        //array ventas desde esta clase -> clase ventas -> array productos vendidos-> fijarme a donde pertenecen y filtrar
        $colVentas = $this->getArrayVentasRealizadas();
        $contadorImportados = 0;
        $promedio = 0;
        foreach ($colVentas as $objVenta) {
                $colProductosVendidos = $objVenta->getArrayProductosVendidos();
                $cantidadProductos = count($colProductosVendidos);
                foreach ($colProductosVendidos as $objProducto) {
                    if ($objProducto instanceof Productos_Importados){
                        $contadorImportados++;
                    }
                }
            }
            if ($cantidadProductos > 0){
                $promedio = $contadorImportados / $cantidadProductos;
            }
            return $promedio; //devuelve cero o el promedio posta
        }



    /**
     * método que retorna todos los productos que fueron comprados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro.
    */
    public function informarConsumoCliente($tipoDoc,$numDoc){
        //de acá es el array ventas -> clase ventas-> obj cliente -> datos
        $colVentas = $this->getArrayVentasRealizadas();
        $compradosXCliente = [];
        
        foreach ($colVentas as $objVenta) {
            $objCliente = $objVenta->getObjetoCliente();
            $tipoDni = $objCliente->getTipoDocumento();
            $dni = $objCliente->getNumeroDocumento();
            if (($tipoDni == $tipoDoc) && ($numDoc== $dni)){
                $productosVendidos = $objVenta->getArrayProductosVendidos();
                array_push($compradosXCliente, $productosVendidos);
            }
        }
        return $compradosXCliente; //retorno un array vacio o uno lleno de uno o mas, productos que compró ese cliente
    }


    /**
    * funcionque ordena de forma descendiente un arreglo q entra por parametro
    */
    public function ordenarArregloDesc($array)
    {
        $ordenado = $array;
    
        uasort($ordenado, function ($a, $b) {
            return $b["cantidad"] - $a["cantidad"];
        });
    
        return $ordenado; // único return al final
    }
}
