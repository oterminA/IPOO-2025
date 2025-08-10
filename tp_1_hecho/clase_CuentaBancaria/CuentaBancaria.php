<?php

class CuentaBancaria{
    
    //variables instancias
    private $numeroCuenta;
    private $dniCliente;
    private $saldoActual;
    private $interesAnual;

    //constructor
    public function __construct($nroCuenta, $dni, $saldoAct, $intAnual){
        $this->numeroCuenta = $nroCuenta;
        $this->dniCliente = $dni;
        $this->saldoActual = $saldoAct;
        $this->interesAnual = $intAnual;
    }
    //metodos de acceso
    //observadoras 
    public function getNumeroCuenta(){
        return $this->numeroCuenta;
    }
    public function getDniCliente(){
        return $this->dniCliente;
    }
    public function getSaldoActual(){
        return $this->saldoActual;
    }
    public function getInteresAnual(){
        return $this->interesAnual;
    }

    //modificadoras
    public function setNumeroCuenta($nroCuenta){
        $this->numeroCuenta = $nroCuenta;
    }
    public function setDniCliente($dni){
        $this->dniCliente = $dni;
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
        //Float $tasaActual, $interesDiario, $total
        $tasaAnual = ($this->getInteresAnual() / 100); // Convertir a decimal
        $interesDiario = ($tasaAnual / 365) * $this->getSaldoActual();
        $this->setSaldoActual($this->getSaldoActual() + $interesDiario); // Sumar el interés al saldo
        $total = $this->getSaldoActual();
        return $total;
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
        $mensaje = ">Número de cuenta: " . $this->getNumeroCuenta() . ".\n" .
        ">Número de DNI cliente: " . $this->getDniCliente() . ".\n" .
        ">Saldo actual: $" . $this->getSaldoActual() . ".\n" .
        ">Interés anual aplicado: " . $this->getInteresAnual() . "%.\n" ;
        return $mensaje;
    }
}

?>