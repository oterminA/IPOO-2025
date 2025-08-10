<?php
class Caja_Ahorro extends Cuenta{
    //atributos

    //constructor de esta clase
    public function __construct($objDuenio, $saldo){
        //constructor padre
        parent::__construct($objDuenio, $saldo);

    }

    //toString
    public function __toString(){
       $mensaje =
       parent::__toString() . "\n";
       return $mensaje;

    }
}

?>