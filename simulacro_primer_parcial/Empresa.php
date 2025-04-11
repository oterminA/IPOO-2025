<?php
class Empresa
{
    //variables instancia (atributos)
    private string $denominacionEmpresa;
    private string $direccionEmpresa;
    private object $objetoArrayClientes;
    private object $objetoArrayMotos;
    private object $objetoArrayVentas;

    //metodo constructor
    public function __construct($denominacion, $direccion, $objArrayClientes, $objArrayMotos, $objArrayVentas)
    {
        $this->denominacionEmpresa = $denominacion;
        $this->direccionEmpresa = $direccion;
        $this->objetoArrayClientes = $objArrayClientes;
        $this->objetoArrayMotos = $objArrayMotos;
        $this->objetoArrayVentas = $objArrayVentas;
    }

    //metodos de acceso
    //observadoras (get)
    public function getDenominacionEmpresa(): string
    {
        return $this->denominacionEmpresa;
    }
    public function getDireccionEmpresa(): string
    {
        return $this->direccionEmpresa;
    }
    public function getObjetoArrayClientes()
    {
        return $this->objetoArrayClientes;
    }
    public function getObjetoArrayMotos()
    {
        return $this->objetoArrayMotos;
    }
    public function getObjetoArrayVentas()
    {
        return $this->objetoArrayVentas;
    }

    //modificadoras (set)
    public function setDenominacionEmpresa($denominacion)
    {
        $this->denominacionEmpresa = $denominacion;
    }
    public function setDireccionEmpresa($direccion)
    {
        $this->direccionEmpresa = $direccion;
    }
    public function setObjetoArrayClientes($objArrayClientes)
    {
        $this->objetoArrayClientes = $objArrayClientes;
    }
    public function setObjetoArrayMotos($objArrayMotos)
    {
        $this->objetoArrayMotos = $objArrayMotos;
    }
    public function setObjetoArrayVentas($objArrayVentas)
    {
        $this->objetoArrayVentas = $objArrayVentas;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            ">Denominacion empresa: " . $this->getDenominacionEmpresa() . "\n" .
            ">Direccion empresa: " . $this->getDireccionEmpresa() . "\n" .
            ">Clientes: " . $this->recorrerLosArreglos($this->getObjetoArrayClientes()) . "\n" .
            ">Motos: " . $this->recorrerLosArreglos($this->getObjetoArrayMotos()) . "\n" .
            ">Ventas: " . $this->recorrerLosArreglos($this->getObjetoArrayVentas()) . "\n" ;
        return $mensaje;
    }



    //////
    //metodos nuevos
    /**
     * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres (funciona para las tres colecciones)
    */
    public function recorrerLosArreglos($arreglo){
        $mensaje = "";
        foreach ($arreglo as $elemento){
            $mensaje = $mensaje . " " . $elemento . "\n";
        }
    }



    /**
     *recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     *@param int $codigoMoto
     *@return int $posicionCodigoMoto
     */
    public function retornarMoto($codigoMoto)
    {
        //Int $cont
        //Array $arregloMotos
        //Boolean $codigoEncontrado
        $cont = count($this->getObjetoArrayMotos());
        $arregloMotos = $this->getObjetoArrayMotos();
        $i = 0;
        $codigoEncontrado = false; //no esta encontrado por defecto
        while ($i < $cont && !$codigoEncontrado) {
            if ($arregloMotos[$i] === $codigoMoto) {
                $codigoEncontrado = true;
                $posicionCodigoMoto = $arregloMotos[$i];
            }
            $i++;
        }
        return $posicionCodigoMoto;
    }

    /**
     * recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada
     * 
     * 
     */
    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $totalFinal = -1; //por defecto en -1 para poder usar alguna alternativa en el test
    
        if ($objCliente->getEstadoBaja() <> "baja") {
            $nroVenta = count($this->getObjetoArrayVentas());
            $fecha = date("d-m-y"); // es preferible usarlo así o poner el date y listo?
            $arregloMotos = [];
            $venta1 = new Venta($nroVenta, $fecha, $objCliente, $arregloMotos, 0);
            
            //el recorrido es mejor con un while de dos condiciones!!
            foreach ($colCodigosMoto as $codigoM) {
                $objetoMoto = $this->retornarMoto($codigoM); //la funcion daba la posicion dentro del arreglo la moto en cuestion
    
                if ($objetoMoto !== null && $objetoMoto->getMotoActiva()) { //no se por que marca mal a esa variable
                    $precioMoto = $venta1->incorporarMoto($objetoMoto);
    
                    if ($precioMoto > 0) {
                        $totalFinal += $precioMoto;
                    }
                }
            }
    
            if ($totalFinal > 0) {
                $venta1->setPrecioFinal($totalFinal);
                $ventas = $this->getObjetoArrayVentas();
                $ventas[] = $venta1;
                $this->setObjetoArrayVentas($ventas);
            }
        }
    
        return $totalFinal;
    }

    /**
     * recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente
     * 
     * 
     */
    public function retornarVentasXCliente($tipoDoc, $numDoc)
    {
        $arrayVentasRealizadas = $this->getObjetoArrayVentas();
        $arrayVentasHechasCliente = [];
        
        foreach ($arrayVentasRealizadas as $elementoVenta){
            $cliente = $elementoVenta->getObjCliente();
    
            if ($cliente->getTipoDoc() == $tipoDoc && $cliente->getNumDoc() == $numDoc) {
                $arrayVentasRealizadas[] = $elementoVenta;
            }
        }
        return $arrayVentasRealizadas;
    }

}
?>