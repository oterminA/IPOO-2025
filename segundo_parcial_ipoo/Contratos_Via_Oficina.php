<?php
class Contratos_Via_Oficina extends ContratosPlanes{

    //metodo constructor
    public function __construct($codigoContrato, $inicio, $vencimiento, $plan, $estado, $costo, $renovacion, $objCliente)
    {
        parent::__construct($codigoContrato, $inicio, $vencimiento, $plan, $estado, $costo, $renovacion, $objCliente);
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        parent::__toString() ."\n" ;
        return $mensaje;
    }

    //metodos nuevos
}