<?php
/*Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. 
Implementar un método que permita validar una contraseña con la almacenada 
Y un método para cambiar la contraseña actual por otra nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es decir no se encuentra dentro de las cuatro almacenadas). 
Implementar el método recordar que dado el usuario, muestra la frase que permite recordar su contraseña.*/

class Login {
    //atributos
    private $nombreUsuario;
    private $contrasenia;
    private $frase;
    private $arregloContrasenias = [];

    //metodo constructor
    public function __construct($usuario, $contra, $frase, $arregloContrasenias) {
        $this->nombreUsuario = $usuario;
        $this->contrasenia = $contra;
        $this->frase = $frase;
        $this->arregloContrasenias = $arregloContrasenias;
    }

    //observadoras
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    public function getContrasenia() {
        return $this->contrasenia;
    }
    public function getFrase() {
        return $this->frase;
    }
    public function getArregloContrasenias() {
        return $this->arregloContrasenias;
    }

    //modificadoras
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    public function setContrasenia($contra) {
        $this->contrasenia = $contra;
    }
    public function setFrase($frase) {
        $this->frase = $frase;
    }
    public function setArregloContrasenias($arregloContrasenias) {
        $this->arregloContrasenias = $arregloContrasenias;
    }

    //métodos nuevos
    public function existeContrasenia($contra) {
        return $contra == $this->getContrasenia();
    }

    public function contraseniaUsada($contra) {
        return in_array($contra, $this->arregloContrasenias);
    }

    public function cambioContrasenia($nuevaContra) {
        $this->setContrasenia($nuevaContra);
        $this->arregloContrasenias[] = $nuevaContra;
        if (count($this->arregloContrasenias) > 4) {
            array_shift($this->arregloContrasenias);
        }
    }

    public function usuarioExiste($usuario) {
        return $usuario == $this->getNombreUsuario();
    }

    //método toString()
    public function __toString() {
        return ">Nombre usuario: " . $this->getNombreUsuario() . "\n" .
               ">Contraseña: " . $this->getContrasenia() . "\n" .
               ">Frase para recordar contraseña: " . $this->getFrase() . "\n" .
               ">Últimas cuatro contraseñas: " . implode(", ", $this->getArregloContrasenias()) . "\n";
    }
}
