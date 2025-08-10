<?php
class Cuenta_Corriente extends Cuenta{
    //atributos
    private $montoGirarDescubierto; //monto maximo que se puede girar en descubierto (?

    //constructor de esta clase
    public function __construct($objDuenio, $saldo, $girarDescubierto){
        $this->montoGirarDescubierto=$girarDescubierto;
        //constructor padre
        parent::__construct($objDuenio, $saldo);
    }

    //get y set
    public function getMontoGirarDescubierto(){
        return $this->montoGirarDescubierto;
    }
    private function setMontoGirarDescubierto($girarDescubierto){
        $this->montoGirarDescubierto=$girarDescubierto;
    }

    //toString
    public function __toString(){
        $mensaje = 
        parent::__toString() . "\n" .
        "Monto maximo para girar en descubierto: $" . $this->getMontoGirarDescubierto() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /*se tendria que hacer una redefinicion de los metodos porque sirven pero el saldo es el montomaximo para girar en descubierto, no? entonces los metodos no son lo mismo en su totalidad*/
    /**
    * permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
    */
    public function realizarRetiro($monto)
    {
        $retiro = false; //valor por defecto de la bandera
        $saldoActual = $this->getSaldoCuenta();
        $importeDescubierto = $this->getMontoGirarDescubierto();
        $saldoTotal = $saldoActual + $importeDescubierto; //el saldo actual más el importe a girar en descubierto
        $retiro = parent::realizarRetiro($monto); //traigo el metodo hecho en la clase padre que devuelve true o false

        if ($retiro){ //o sea que si se pudo hacer el retiro
            if($saldoTotal >=$monto){
                $this->setSaldoCuenta($saldoActual-$monto); //actualizo el saldo con el retiro hecho
                $this->setMontoGirarDescubierto($importeDescubierto+$saldoActual); //actualizo el monto para girar en descubierto
                $retiro = true; //cambia la bandera porque se pudo hacer el retiro
            }
        }
        return $retiro ; //retorna true si se realizó el retiro, y false si no sepudo
    }
}

?>