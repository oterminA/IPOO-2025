<?php
/*En la clase Persona se registra la siguiente información: nombre, apellido, dirección, mail y teléfono. 
El método constructor de la clase Persona, debe recibir como parámetros todos  los valores iniciales para los atributos definidos en la clase. */
class Persona{
    //atributos (variables instancia)
    private $nombrePersona; //string
    private $apellidoPersona; //string
    private $direccionPersona; //string
    private $mailPersona; //string
    private $telefonoPersona; //

    //metodo constructor
    public function __construct($nombre, $apellido, $direccion, $mail, $telefono)
    {
        $this->nombrePersona=$nombre;
        $this->apellidoPersona=$apellido;   
        $this->direccionPersona=$direccion;   
        $this->mailPersona=$mail;   
        $this->telefonoPersona=$telefono;   

    }

    //metodos de accedo: getters  y setters
    //get
    public function getNombrePersona(){
        return $this->nombrePersona;
    }
    public function getApellidoPersona(){
        return $this->apellidoPersona;
    }
    public function getDireccionPersona(){
        return $this->direccionPersona;
    }
    public function getMailPersona(){
        return $this->mailPersona;
    }
    public function getTelefonoPersona(){
        return $this->telefonoPersona;
    }

    //set
    public function setNombrePersona($nombre){
        $this->nombrePersona=$nombre;
    }
    public function setpellidoPersona($apellido){
        $this->apellidoPersona=$apellido;   
    }
    public function setDireccionPersona($direccion){
        $this->direccionPersona=$direccion;   
    }
    public function setMailPersona($mail){
        $this->mailPersona=$mail;   
    }
    public function setTelefonoPersona($telefono){
        $this->telefonoPersona=$telefono; 
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Nombre: " . $this->getNombrePersona() . "\n" .
        "Apellido: " . $this->getApellidoPersona() . "\n" .
        "Direccion: " . $this->getDireccionPersona() . "\n" .
        "Mail:" . $this->getMailPersona() . "\n" .
        "Numero de telefono: " . $this->getTelefonoPersona() . "\n" ;
        return $mensaje;
    }

}

?>