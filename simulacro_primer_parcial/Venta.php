<?php
class Venta
{
    //atributos (variables instancia)
    private int $numeroVenta;
    private string $fechaVenta;
    private object $objetoCliente;
    private object $objetoArrayMotos;
    private float $precioFinal;

    //metodo constructor
    public function __construct($nroVenta, $fecha,  $objCliente, $objArrayMotos, $precioF)
    {
        $this->numeroVenta = $nroVenta;
        $this->fechaVenta = $fecha;
        $this->objetoCliente = $objCliente;
        $this->objetoArrayMotos = $objArrayMotos;
        $this->precioFinal = $precioF;
    }

    //metodos de acceso: get y set
    //observadoras (get)
    public function getNumeroVenta(): int
    {
        return $this->numeroVenta;
    }
    public function getFechaVenta(): string
    {
        return $this->fechaVenta;
    }
    public function getObjetoCliente()
    {
        return $this->objetoCliente;
    }
    public function getObjetoArrayMotos()
    {
        return $this->objetoArrayMotos;
    }
    public function getPrecioFinal(): float
    {
        return $this->precioFinal;
    }

    //modificadoras (set)
    public function setNumeroVenta($nroVenta)
    {
        $this->numeroVenta = $nroVenta;
    }
    public function setFechaVenta($fecha)
    {
        $this->fechaVenta = $fecha;
    }
    public function setObjetoCliente($objCliente)
    {
        $this->objetoCliente = $objCliente;
    }
    public function setObjetoArrayMotos($objArrayMotos)
    {
        $this->objetoArrayMotos = $objArrayMotos;
    }
    public function setPrecioFinal($precioF)
    {
        $this->precioFinal = $precioF;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            ">Numero venta: " . $this->getNumeroVenta() . "\n" .
            ">Fecha venta: " . $this->getFechaVenta() . "\n" .
            ">Cliente: " . $this->getObjetoCliente() . "\n" .
            ">Motos: " . $this->mostrarArrayMotos() . "\n" .
            ">Precio final: $" . $this->getPrecioFinal() . "\n";
        return $mensaje;
    }


    ////////
    //metodo nuevo
    /**
     *recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
     *@param object $objMoto
     *@return float $precioFinal
     */
    public function incorporarMoto($objMoto)
    {
        //Array $arregloMotos

        $precioFinal = -1; //es lo que voy a usar en caso de que no se pueda realizar la venta, de otra forma uso el precio actualizado
        if ($objMoto->getMotoActiva()) {
            $arregloMotos = $this->getObjetoArrayMotos();
            $arregloMotos[] = $objMoto;
            $this->setObjetoArrayMotos($arregloMotos);

            $precioFinal = $this->getPrecioFinal() + $objMoto->darPrecioVenta();
            $precioFinal = $this->setPrecioFinal($precioFinal);
        }

        return $precioFinal;
    }


    /**
     * retorna como cadena de caracteres las motos del arreglo
     */
    public function mostrarArrayMotos()
    {
        $mensaje = "";
        $arregloMotos = $this->getObjetoArrayMotos();
        $n = count($arregloMotos);
        for ($i = 0; $i < $n; $i++) {
            $mensaje = "Moto " . ($i + 1) . ": " . $arregloMotos[$i] . "\n";
        }
        return $mensaje;
    }
}
