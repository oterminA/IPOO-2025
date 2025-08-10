<?php
include_once 'Persona.php';
class AlumnoFai extends Persona {
    //atributos alumno
    private $legajo;
    
    //constructor alumno
    public function __construct($videntificacion, $vnombre, $vapellido, $vlegajo){
        //se invoca al constructor de Persona
        parent::__construct($videntificacion, $vnombre, $vapellido);
        //pongo el atribruto normalmente
        $this-> legajo = $vlegajo;
    }

    //metodos de acceso
    public function getLegajo(){
        return $this->legajo ;
    }
    public function setLegajo($vlegajo){
        $this->legajo=$vlegajo;
    }

    //redefinicion toString
    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "\n Legajo: " . $this->getLegajo() ;
        return $cadena;
    }
}


?>