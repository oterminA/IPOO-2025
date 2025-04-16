
<?php
/*En la clase Vuelo:
Se registra la siguiente información: número, importe, fecha, destino, hora arribo, hora partida, cantidad asientos totales y disponibles, y una referencia a la persona responsable del vuelo. 
Se cuenta con la implementación de:
    -un Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
    -los métodos de acceso de cada uno de los atributos de la clase.
En la clase Vuelo se debe implementar el método asignarAsientosDisponibles que recibe por parámetros la cantidad de asientos que desean asignarse y de ser necesario actualizando la información del vuelo.
El método retorna verdadero en caso que la asignación puedo concretarse y falso en caso contrario.*/
class Vuelo
{
    //atributos (variables instancia)
    private $numeroVuelo; //int
    private $importeVuelo; //float
    private $fechaVuelo; //string
    private $destinoVuelo; //string
    private $horaArriboVuelo; //string
    private $horaPartidaVuelo; //string
    private $cantAsientosTotales; //int
    private $cantAsientosDisponibles; //int
    private $objetoPersonResponsable; //referencia a obj persona con nombre, apellido, mail, tel y direccion

    //metodo constructor
    public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $asientosTotales, $asientosDisponibles, $objPersona)
    {
        $this->numeroVuelo = $numero;
        $this->importeVuelo = $importe;
        $this->fechaVuelo = $fecha;
        $this->destinoVuelo = $destino;
        $this->horaArriboVuelo = $horaArribo;
        $this->horaPartidaVuelo = $horaPartida;
        $this->cantAsientosTotales = $asientosTotales;
        $this->cantAsientosDisponibles = $asientosDisponibles;
        $this->objetoPersonResponsable = $objPersona; //objeto de la clase Persona  
    }

    //metodos de accedo: getters  y setters
    //get
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }
    public function getImporteVuelo()
    {
        return $this->importeVuelo;
    }
    public function getFechaVuelo()
    {
        return $this->fechaVuelo;
    }
    public function getDestinoVuelo()
    {
        return $this->destinoVuelo;
    }
    public function getHoraArriboVuelo()
    {
        return $this->horaArriboVuelo;
    }
    public function getHoraPartidaVuelo()
    {
        return $this->horaPartidaVuelo;
    }
    public function getAsientosTotales()
    {
        return $this->cantAsientosTotales;
    }
    public function getAsientosDisponibles()
    {
        return $this->cantAsientosDisponibles;
    }
    public function getObjetoPersona()
    {
        return $this->objetoPersonResponsable;
    }

    //set
    public function setNumeroVuelo($numero)
    {
        $this->numeroVuelo = $numero;
    }
    public function setImporteVuelo($importe)
    {
        $this->importeVuelo = $importe;
    }
    public function setFechaVuelo($fecha)
    {
        $this->fechaVuelo = $fecha;
    }
    public function setDestinoVuelo($destino)
    {
        $this->destinoVuelo = $destino;
    }
    public function setHoraArriboVuelo($horaArribo)
    {
        $this->horaArriboVuelo = $horaArribo;
    }
    public function setHoraPartidaVuelo($horaPartida)
    {
        $this->horaPartidaVuelo = $horaPartida;
    }
    public function setAsientosTotales($asientosTotales)
    {
        $this->cantAsientosTotales = $asientosTotales;
    }
    public function setAsientosDisponibles($asientosDisponibles)
    {
        $this->cantAsientosDisponibles = $asientosDisponibles;
    }
    public function setObjetoPersona($objPersona)
    {
        $this->objetoPersonResponsable = $objPersona;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Numero vuelo: " . $this->getNumeroVuelo() . "\n" .
            "Importe vuelo: $" . $this->getImporteVuelo() . "\n" .
            "Fecha: " . $this->getFechaVuelo() . "\n" .
            "Destino:" . $this->getDestinoVuelo() . "\n" .
            "Hora arribo: " . $this->getHoraArriboVuelo() . "\n" .
            "Hora partida: " . $this->getHoraPartidaVuelo() . "\n" .
            "Cantidad de asientos totales: " . $this->getAsientosTotales() . "\n" .
            "Cantidad de asientos disponibles: " . $this->getAsientosDisponibles() . "\n" .
            "Persona responsable: " . $this->getObjetoPersona() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * recibe por parámetros la cantidad de asientos que desean asignarse y de ser necesario actualizando la información del vuelo.
    */
    public function asignarAsientosDisponibles($asientosParaAsignar)
    {
        $asignacion = false; //por defecto no se puede asignar
        $asientosD = $this->getAsientosDisponibles();
        //la cantidad de asientos disponibles no puede ser mayor a la cantidad de asientos totales
        if ($asientosD >= $asientosParaAsignar) {
            //actualizo la cantidad de asientos disponibles
            $disponibilidad = $this->setAsientosDisponibles($asientosD - $asientosParaAsignar); 
            $asignacion = true; //ahora se puede asignar
        } 
        return $asignacion;
    }
}
