<?php
class Disquera
{
    //atributos
    private $arrayHoraDesde;
    private $arrayHoraHasta;
    private $estadoTienda;    //string
    private $direccionTienda; //string
    private $objetoDueño;    //referencia al obj Persona(nombre, apellido, tipo y nroDOC)

    //constructor
    public function __construct($desde, $hasta, $estado, $direccion, $objDueño)
    {
        $this->arrayHoraDesde  = $desde;
        $this->arrayHoraHasta  = $hasta;
        $this->estadoTienda    = $estado;
        $this->direccionTienda = $direccion;
        $this->objetoDueño    = $objDueño;
    }

    //getters
    public function getArrayHoraDesde()
    {
        return $this->arrayHoraDesde;
    }
    public function getArrayHoraHasta()
    {
        return $this->arrayHoraHasta;
    }
    public function getEstadoTienda()
    {
        return $this->estadoTienda;
    }
    public function getDireccionTienda()
    {
        return $this->direccionTienda;
    }
    public function getObjetoDueño()
    {
        return $this->objetoDueño;
    }

    //setters
    public function setArrayHoraDesde($desde)
    {
        $this->arrayHoraDesde = $desde;
    }
    public function setArrayHoraHasta($hasta)
    {
        $this->arrayHoraHasta = $hasta;
    }
    public function setEstadoTienda($estado)
    {
        $this->estadoTienda = $estado;
    }
    public function setDireccionTienda($direccion)
    {
        $this->direccionTienda = $direccion;
    }
    public function setObjetoDueño($objDueño)
    {
        $this->objetoDueño = $objDueño;
    }

    //redefinicion __toString()
    public function __toString()
    {
        $desde = $this->getArrayHoraDesde();
        $hasta = $this->getArrayHoraHasta();

        $mensaje =
            "Hora abierto: " . $desde["hora"] . ":" . $desde["minutos"] . "\n" .
            "Hora cerrado: " . $hasta["hora"] . ":" . $hasta["minutos"] . "\n" .
            "Estado: " . $this->getEstadoTienda() . "\n" .
            "Direccion tienda: " . $this->getDireccionTienda() . "\n" .
            "Dueño disquera----\n" . $this->getObjetoDueño() . "\n";
        return $mensaje;
    }

    //metodos nuevos

    /**
     * que dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false en caso contrario.
     */
    public function dentroHorarioAtencion($hora, $minutos)
    {
        $horaActual = $hora * 60 + $minutos; //la hora actual queda toda sumada en minutos, pej 6000
        $dentroHorario = false; //falso por defecto, no esta abierto

        $desdeHora = $this->getArrayHoraDesde()["hora"];   //saco la hora desde
        $desdeMin  = $this->getArrayHoraDesde()["minutos"]; // saco los min desde

        $hastaHora = $this->getArrayHoraHasta()["hora"];   //saco la hora hasta
        $hastaMin  = $this->getArrayHoraHasta()["minutos"]; //saco los min hasta

        $desdeTotal = $desdeHora * 60 + $desdeMin; ///hago lo mismo que en horaActual
        $hastaTotal = $hastaHora * 60 + $hastaMin;

        if ($horaActual >= $desdeTotal && $horaActual <= $hastaTotal) {
            $dentroHorario = true; //esta abierto
        }
        return $dentroHorario;
    }

    /**
     *  que dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
     */
    public function abrirDisquera($hora, $minutos)
    {
        $dentroHorario = $this->dentroHorarioAtencion($hora, $minutos); //devuelve true o false

        if ($dentroHorario) {
            $this->setEstadoTienda("abierto");
        }
    }

    /**
     *  que dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
     */
    public function cerrarDisquera($hora, $minutos)
    {
        $fueraHorario = $this->dentroHorarioAtencion($hora, $minutos); //devuelve true o false

        if (!$fueraHorario) {
            $this->setEstadoTienda("cerrado");
        }
    }
}
