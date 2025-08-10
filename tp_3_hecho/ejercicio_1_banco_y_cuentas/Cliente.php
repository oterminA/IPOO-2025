<?php
//Defina e implemente una clase Cliente que hereda de la clase Persona (DNI, Nombre y Apellido) con la información básica de un cliente (Nro. de Cliente, DNI, Nombre y Apellido)
include_once 'Persona.php';
class Cliente extends Persona {
    //var instancia
    private $numeroCliente;

    //construct de Cliente
    public function __construct($nombre, $apellido, $nroDoc, $nroCliente){
        parent::__construct($nombre, $apellido, $nroDoc);
        $this->numeroCliente=$nroCliente;
    }

    //gets y sets
    public function getNumeroCliente(){
        return $this->numeroCliente;
    }
    public function setNumeroCliente($nroCliente){
        $this->numeroCliente=$nroCliente;
    }

    //redefinicion __toString(){
        public function __toString(){
            $cadena = 
            parent::__toString() . "\n" . 
            "Numero cliente: " . $this->getNumeroCliente() ;
            return $cadena;
        }
    }
?>
