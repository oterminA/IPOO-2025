<?php
class Cuenta{
    private static $nroCuentasCreadas = 0;

    //variables instancias
    private $objetoDuenio; //referencia a clase Persona (nombre, apellido, dni)
    private $numeroCuenta;
    private $saldoCuenta;

    //constructor
    public function __construct($objDuenio, $saldo){
        $this->objetoDuenio=$objDuenio;
        $this->saldoCuenta=$saldo;
        $this->numeroCuenta = ++self::$nroCuentasCreadas;
    }

    //metodos de acceso
    //observadoras 
    public function getObjetoDuenio(){
        return $this->objetoDuenio;
    }
    public function getNumeroCuenta(){
        return $this->numeroCuenta;
    }
    public function getSaldoCuenta(){
        return $this->saldoCuenta;
    }

    //modificadoras no hay publicas en este caso porque no se si quiero que desde afuera puedan modificar esos atributos
    private function setObjetoDuenio($objDuenio){
        $this->objetoDuenio=$objDuenio;
    }
    private function setNumeroCuenta($nroCuenta){
        $this->numeroCuenta=$nroCuenta;
    }
    public function setSaldoCuenta($saldo){
        $this->saldoCuenta=$saldo;
    }

    //redefinir el toString
    public function __toString(){
        $mensaje = 
        "Propietario de la cuenta---" .  "\n" . $this->getObjetoDuenio() . "\n".
        "Numero cuenta: " . $this->getNumeroCuenta() . "\n".
        "Saldo: $" . $this->getSaldoCuenta();
        return $mensaje;
    }

    //metodos nuevos
    /**
     *  retorna el saldo de la cuenta.
    */
    public function saldoCuenta(){
        return $this->getSaldoCuenta();
    }

    /**
     *  permite realizar un depósito a la cuenta una cantidad “monto” de dinero.
    */
    public function realizarDeposito($monto){
        $this->setSaldoCuenta($this->getSaldoCuenta() + $monto);
        $depositado = $this->getSaldoCuenta();
    return $depositado;
    }

    /**
     * permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
    */
    public function realizarRetiro($monto){
        $retiro = false; //valor por defecto de la bandera
        if ($monto <= $this->getSaldoCuenta()) {
            $this->setSaldoCuenta($this->getSaldoCuenta() - $monto);
            $retiro = true;
        }
        return $retiro; //devuelve un booleano, true=se pudo realizar el retiro, false=no se pudo
    }
}

?>