<?php
class Contratos_Via_Web extends ContratosPlanes{
    //atributos (variables instancia)
    private $porcentajeDescuento;

    //metodo constructor
    public function __construct($codigoContrato,$inicio, $vencimiento, $plan, $estado, $costo, $renovacion, $objCliente)
    {
        $this->porcentajeDescuento=0.10;   //por defecto ya tiene un 10%
        parent::__construct($codigoContrato, $inicio, $vencimiento, $estado, $costo, $renovacion, $objCliente);
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
        parent::__toString() ."\n" . 
        "Porcentaje de descuento: " . $this->getPorcentajeDescuento() . "%\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * método que retorna el importe final correspondiente al importe del contrato.
     * El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan más los importes parciales de cada uno de 
     * los canales que lo forman. Si se trata de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento 
     * que por defecto es del 10%. 
    */
    public function calcularImporte(){
        $importePadre = parent::calcularImporte(); //recupero el resultado del metodo padre
        $descuento = $this->getPorcentajeDescuento();
        $importeFinal = $importePadre - ($importePadre*$descuento);
        return $importeFinal; //retorna el importe final del padre menos el descuento aplicado 
    }
}