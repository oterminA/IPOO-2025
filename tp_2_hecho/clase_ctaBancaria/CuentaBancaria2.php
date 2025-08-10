<?php

class CuentaBancaria{
    //se puede usar el static para poner a numero de cuenta
    
    //variables instancias
    private $numeroCuenta;
    private $objetoPersona;
    private $saldoActual;
    private $interesAnual;

    //constructor
    public function __construct($nroCuenta, $objPersona, $saldoAct, $intAnual){
        $this->numeroCuenta = $nroCuenta;
        $this->objetoPersona=$objPersona;
        $this->saldoActual = $saldoAct;
        $this->interesAnual = $intAnual;
    }
    //metodos de acceso
    //observadoras 
    public function getObjetoPersona(){
        return $this->objetoPersona;
    }
    public function getNumeroCuenta(){
        return $this->numeroCuenta;
    }
    public function getSaldoActual(){
        return $this->saldoActual;
    }
    public function getInteresAnual(){
        return $this->interesAnual;
    }

    //modificadoras
    public function setObjetoPersona($objPersona){
        $this->objetoPersona = $objPersona;
    }
    public function setNumeroCuenta($nroCuenta){
        $this->numeroCuenta = $nroCuenta;
    }
    public function setSaldoActual($saldoAct){
        $this->saldoActual = $saldoAct;
    }
    public function setInteresAnual($intAnual){
        $this->interesAnual = $intAnual;
    }

    //metodos nuevos
    /**
     * actualizará el saldo de la cuenta aplicándole el interés diario (interés anual dividido entre 365 aplicado al saldo actual)
     * @return float $total
    */
    public function actualizarSaldo(){
        $this->setSaldoActual( $this->getSaldoActual() + $this->getInteresAnual() / 365);
        return $this->getSaldoActual();
    }

    /**
     * permitirá ingresar una cantidad de dinero en la cuenta.
     * @param float $cant
     * @return float $depositado
    */
    public function depositar($cant){
        //Float $depositado
            $this->setSaldoActual($this->getSaldoActual() + $cant);
            $depositado = $this->getSaldoActual();
        return $depositado;
    }

    /**
     * permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
     * @param float $cant
     * @return float $retiro
    */
    public function retirar($cant){
        //Float $retiro
        $retiro = -1;
        if ($cant <= $this->getSaldoActual()) {
            $this->setSaldoActual($this->getSaldoActual() - $cant);
            $retiro = $this->getSaldoActual(); 
        }
        return $retiro;
    }

    //redefinir el método __toString()
    public function __toString(){
        //string $mensaje
        $mensaje = 
        ">Número de cuenta: " . $this->getNumeroCuenta() . ".\n" .
        ">Datos cliente----\n" . $this->getObjetoPersona() . ".\n" .
        ">Saldo actual: $" . $this->getSaldoActual() . ".\n" .
        ">Interés anual aplicado: " . $this->getInteresAnual() . "%.\n" ;
        return $mensaje;
    }
}

?>