<?php
class Login {
    //atributos
    private $nombreUsuario;
    private $contrasenia;
    private $frase;
    private $arregloContrasenias;

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
    /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
    */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if($cantidadArreglo == 0){
            $mensaje = "Arreglo sin elementos. \n";
        }else{
            for($i=0; $i<$cantidadArreglo; $i++){
                $mensaje = $mensaje . "Elemento N°". $i+1 . ": ". $arreglo[$i] ."\n";
            }
        }
        return $mensaje;
    }

    /**
     * retorna boolean si la contraseña existe o no, seria la contraseña actual
    */
    public function existeContrasenia($contra) {
        $existeContra = false; //bandera
        $existeContra = $contra == $this->getContrasenia();
        return $existeContra; //devuelve boolean
    }

    /**
     * la function revisa si la contraseña usada existe dentro de las ya almacenadas
    */
    public function contraseniaUsada($contra) {
        $coleccionContrasenias = $this->getArregloContrasenias();
        $cantidadContras = count($coleccionContrasenias); //la cantidad de contraseñas almacenadas
        $i=0;
        $encontrada = false; //bandera
        while (($i<$cantidadContras) && !$encontrada){
            $unaContra = $coleccionContrasenias[$i]; //recupero una de las contraseñas
            if ($contra === $unaContra){
                $encontrada =true;
            }
            $i++;
        }
        return $encontrada; //devuelve true si se encontró o sea es usada, false si no se encontró yno es usada
    }

    /**
     * function para cambiar la contraseña y agregar la anterior al arreglo
    */
    public function cambioContrasenia($nuevaContra) {
       $contraVieja = $this->getContrasenia(); //acá guardo la contraseña vieja, q es la actual
       $usada = $this->contraseniaUsada($nuevaContra); //si da true, es porque fue usada
       if (!$usada){
        $this->setContrasenia($nuevaContra); //si no fue usada ultimamente, la seteo como nueva contraseña
        $coleccionContrasenias = $this->getArregloContrasenias();
        array_push($coleccionContrasenias, $contraVieja); //pusheo la contra vieja al arreglo de contraseñas ultimamente usadas
       }
    }

    /**
     * la funcion si recuerda el usuario, le muestra la frase
    */
    public function recordar($usuario) {
        $elUsuario = $this->getNombreUsuario();
        $frase = null;
        if ($elUsuario === $usuario){
            $frase = $this->getFrase();
        }
        return $frase; //retorna la frase si el usuario coincide, o devuelve null
    }

    //método toString()
    public function __toString() {
        $mensaje =
         ">Nombre usuario: " . $this->getNombreUsuario() . "\n" .
               ">Contraseña: " . $this->getContrasenia() . "\n" .
               ">Frase para recordar contraseña: " . $this->getFrase() . "\n" .
               ">Últimas cuatro contraseñas---\n" . $this->recorrerLosArreglos($this->getArregloContrasenias()) . "\n";
               return $mensaje;
    }
}
