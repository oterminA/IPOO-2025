<?php
/*1. Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. 
Es importante tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos..
Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga
transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del
peso de la carga, dicho índice se guarda en cada vagón de carga.
2. Implementar el método incorporarPasajeroVagon que recibe por parámetro la cantidad de pasajeros
que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan el
peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no
agregar los pasajeros al vagón.
3. Implementar el método incorporarCargaVagon que recibe por parámetro la cantidad de carga que va
a transportar el vagón y tiene la responsabilidad de actualizar las variables instancias que representan
el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la
carga al vagón.
4. Implementar el método calcularPesoVagon y redefinirlo según sea necesario. No olvidar agregar el
peso que tiene el vagón vacío. */
class Vagon{
    //atributos (variables instancia)
    private $anioInstalacion;
    private $largoVagon;
    private $anchoVagon;
    private $pesoVagonVacio; 
    private $pesoActual; //?

    //metodo constructor
    public function __construct($anio, $largo, $ancho, $pesoVacio, $actual)
    {
        $this->anioInstalacion=$anio;
        $this->largoVagon=$largo;
        $this->anchoVagon=$ancho;
        $this->pesoVagonVacio=$pesoVacio; 
        $this->pesoActual = $actual;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getAnioInstalacionVagon(){
        return $this->anioInstalacion;
    }
    public function getLargoVagon(){
        return $this->largoVagon;
    }
    public function getAnchoVagon(){
        return $this->anchoVagon;
    }
    public function getPesoVagonVacio(){
        return $this->pesoVagonVacio;
    }

    //set
    public function setAnioInstalacionVagon($anio){
        $this->anioInstalacion=$anio;
    }
    public function setLargoVagon($largo){
        $this->largoVagon=$largo;
    }
    public function setAnchoVagon($ancho){
        $this->anchoVagon=$ancho;
    }
    public function setPesoVagonVacio($pesoVacio){
        $this->pesoVagonVacio=$pesoVacio;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Año instalacion vagon: " . $this->getAnioInstalacionVagon() . "\n" . 
        "Largo vagon: " . $this->getLargoVagon() . "\n" . 
        "Ancho vagon: " . $this->getAnchoVagon() . "\n" . 
        "Peso vagon vacio: " . $this->getPesoVagonVacio() . "kg\n" ;
        return $mensaje;
    }

    //metodo nuevo
    /**
     * método calcularPesoVagon y redefinirlo según sea necesario. No olvidar agregar el peso que tiene el vagón vacío
    */
    public function calcularPesoVagon(){
        //no entiendo que tendria que hacer este metodo?? solo poner el peso vacio????? porque no hay una base para el metodo que pueda despues redefinir, o sea en las otras dos clases tengo que usar dos operaciones diferentes para calcular el peso?? 
        //PREGUNTA: cuando redefino es en un método aparte? o sea puede redefinirse dentro de otro metodo???
        return $this->getPesoVagonVacio();
    }

}
?>
