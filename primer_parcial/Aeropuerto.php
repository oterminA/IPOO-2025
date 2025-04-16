<?php
/**En la clase Aeropuerto se registra la siguiente información: denominación, dirección y la colección de aerolíneas que arriban a el.
 * Implementar el método retornarVuelosAerolinea que recibe por parámetro una aerolínea y retorna todos los vuelos asignados a esa aerolínea.
 * Implementar el método ventaAutomatica que recibe por parámetro la cantidad de asientos, una fecha y un destino y el aeropuerto realiza automáticamente la asignación al vuelo. 
Para la implementación de este método debe utilizarse uno de los métodos implementados en la clase Vuelo. 
*/
class Aeropuerto{
    //atributos (variables instancia)
    private $denominacionAeropuerto; //string
    private $direccionAeropuerto; //string  
    private $objetoArrayAerolinea; //array de objetos de la clase Aerolinea

    //metodo constructor
    public function __construct($denominacion, $direccion, $objArrayAerolinea)
    {
        $this->denominacionAeropuerto=$denominacion;
        $this->direccionAeropuerto=$direccion;   
        $this->objetoArrayAerolinea=$objArrayAerolinea; 
    }

    //metodos de accedo: getters  y setters
    //get
    public function getDenominacionAeropuerto(){
        return $this->denominacionAeropuerto;
    }
    public function getDireccionAeropuerto(){
        return $this->direccionAeropuerto;
    }
    public function getObjetoArrayAerolinea(){
        return $this->objetoArrayAerolinea;
    }

    //set
    public function setDenominacionAeropuerto($denominacion){
        $this->denominacionAeropuerto=$denominacion;
    }
    public function setDireccionAeropuerto($direccion){
        $this->direccionAeropuerto=$direccion;   
    }
    public function setObjetoArrayAerolinea($objArrayAerolinea){
        $this->objetoArrayAerolinea=$objArrayAerolinea; 
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Denominacion aeropuerto " . $this->getDenominacionAeropuerto() . "\n" .
        "Direccion aeropuerto: " . $this->getDireccionAeropuerto() . "\n" .
        "Coleccion de aerolineas: " . $this->recorrerLosArreglos($this->getObjetoArrayAerolinea()) . "\n" ;
        return $mensaje;
    }

    //metodos nuevos
    /**
    * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres
     */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        foreach ($arreglo as $elemento) {
            $mensaje .=  $elemento . "\n";
        }
        return $mensaje;
    }

    /**
     * metodo que recibe por parámetro una aerolínea y retorna todos los vuelos asignados a esa aerolínea.
    */
    public function retornarVuelosAerolinea($objAerolinea){
        $arrayAerolineas = $this->getObjetoArrayAerolinea();  //array de las aerolíneas
        $coleccionVuelos = []; // arreglo vacío para llenar con los vuelos
        $aerolineaIdentificacion = $objAerolinea->getIdentificacionAerolinea(); // obtiene la identificación de la aerolínea
        //recorro todas las aereolineas, por eso el foreach
        foreach ($arrayAerolineas as $aerolinea) {
            if ($aerolinea->getIdentificacionAerolinea() == $aerolineaIdentificacion) {
                $objVuelo = $aerolinea->getObjetoArrayVuelo();
                $coleccionVuelos = array_push($coleccionVuelos, $objVuelo); //meto el vuelo a la nueva coleccion de vuelos
            }
        }
        return $coleccionVuelos;
    }

    /**
     * método que recibe por parámetro la cantidad de asientos, una fecha y un destino y el aeropuerto realiza automáticamente la asignación al vuelo. Para la implementación de este método debe utilizarse uno de los métodos implementados en la clase Vuelo. 
    */
    public function ventaAutomatica($cantidadAsientos, $fecha, $destino){
    }

}
?>