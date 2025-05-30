<?php

/* En la clase contrato implementar el método actualizarEstadoContrato: que actualiza el estado del contrato según corresponda. 
Utilice un método diasContratoVencido que recibe por parámetro un contrato y retorna la cantidad de días vencidos o 0 en caso contrario. 
No es necesario que lo implemente.
En la clase Contrato Implementar el método calcularImporte que retorna el importe final correspondiente al importe del contrato.
*/
class ContratosPlanes{
    //atributos (variables instancia)
    private $codigoContrato;
    private $fechaInicio;
    private $fechaVencimiento;
    private $plan;
    private $estadoCliente;
    private $costo;
    private $renuevaONo;
    private $objetoCliente; //referencia a clase CLiente

    //metodo constructor
    public function __construct($codigoContrato, $inicio, $vencimiento, $plan, $estado, $costo, $renovacion, $objCliente)
    {
        $this->codigoContrato=$codigoContrato;   
        $this->fechaInicio=$incio;   
        $this->fechaVencimiento=$vencimiento; 
        $this->plan =$plan;  
        $this->estadoCliente=$estado;   
        $this->costo=$costo;   
        $this->renuevaONo=$renovacion;   
        $this->objetoCliente=$objCliente;   

    }

    //metodos de accedo: getters  y setters
    //get
    public function getCodigoContrato(){
        return $this->codigoContrato;
    }
    public function getFechaInicio(){
        return $this->fechaInicio;
    }
    public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }
    public function getPlan(){
        return $this->plan;
    }
    public function getEstadoCliente(){
        return $this->estadoCliente;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getRenovacion(){
        return $this->renuevaONo;
    }
    public function getObjetoCliente(){
        return $this->objetoCliente;
    }


    //set
    public function setCodigoContrato($codigoContrato){
        $this->codigoContrato=$codigoContrato;
    }
    public function setFechaInicio($inicio){
        $this->fechaInicio=$inicio;
    }
    public function setFechaVencimiento($vencimiento){
        $this->fechaVencimiento=$vencimiento;
    }
    public function setPlan($plan){
        $this->plan=$plan;
    }
    public function setEstadoCliente($estado){
        $this->estadoCliente=$estado;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function setRenovacion($renovacion){
        $this->renuevaONo=$renovacion;
    }
    public function setObjetoCliente($objCliente){
        $this->objetoCliente=$objCliente;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Codigo contrato: " . $this->getCodigoContrato() . "\n".
        "Fecha inicio: " . $this->getFechaInicio() . "\n" . 
        "Fecha vencimiento: " . $this->getFechaVencimiento() . "\n" . 
        "PLan: " . $this->getPlan() . "\n" . 
        "Estado cliente: " . $this->getEstadoCliente() . "\n" . 
        "Costo $: " . $this->getCosto() . "\n" . 
        "Renovacion: " . $this->getRenovacion() . "\n" . 
        "Cliente----\n" . $this->getObjetoCliente() . "\n" ;
        return mensaje;
    }

    //metodos nuevos

    /**
     * Utilice un método diasContratoVencido que recibe por parámetro un contrato y retorna la cantidad de días vencidos o 0 en caso contrario. 
    */
    public function diasContratoVencido($contrato){
        $vencimiento = $contrato->getFechaVencimiento(); //guardo la fecha de vencimineto de ese contrato
        $fechaActual = date("d-m-y"); //guardo la fecha actual
        $dias = $fechaActual - $vencimiento; //resto la fecha actual y la fecha del vencimiento
        $diasVencidos = 0; //esto es lo uqe se retorna, en caso de que no tenga dias vencidos

        if ($dias > $vencimiento){
            $diasVencidos = $dias; //la cantidad de dias que han pasado desde el vencimiento
        }
        
        return $diasVencidos; //retorna la cantidad de dias o cero en caso contrario
    }

    /**
     * método que actualiza el estado del contrato según corresponda. 
    */
    public function actualizarEstadoContrato(){
        $estadoCliente = $this->getEstadoCliente(); //guardo el estado del cliente: moroso,suspendido
    }

    /**
     * método que retorna el importe final correspondiente al importe del contrato.
     * El importe final de un contrato realizado en la empresa se calcula sobre el importe del plan más los importes parciales de cada uno de 
     * los canales que lo forman. Si se trata de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento 
     * que por defecto es del 10%. 
    */
    public function calcularImporte(){
        //recuperar el plan, su importe, los canales, su importe
        $plan = $this->getPlan();//guardo el plan, tengo que sacar el importe
        $importePlan = $plan->getImporte(); //recupero el importe del plan
        $coleccionCanales = $plan->getArrayCanalesOfrece(); //recupero los canales que ofrece
        $sumaImporteCanales = 0; //acumulador de suma
        foreach ($coleccionCanales as $canal) { 
            $importeCanal = $canal->getImporte(); //asi obtengo el importe de cada canal y lo voy sumando
            $sumaImporteCanales = $sumaImporteCanales + $importeCanal; 
        }

        $importeFinal = $importePlan + $sumaImporteCanales;
        return $importeFinal; //retorna el importe final
    }
}