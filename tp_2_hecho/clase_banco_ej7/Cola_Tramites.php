<?php
class Cola_Tramites
{
    //atributos (variables instancia)
    private $tipoTramite;
    private $horarioIngreso; //son arrays asociativos
    private $horarioCierre;
    private $objetoCliente;
    private $fechaIngreso; //string
    private $estado;

    //metodo constructor
    public function __construct($tipoTramite,$horarioIngreso, $horarioCierre, $objetoCliente, $fechaIngreso, $estado)
    {
        $this->tipoTramite=$tipoTramite;
        $this->horarioIngreso = $horarioIngreso;
        $this->horarioCierre = $horarioCierre;
        $this->objetoCliente = $objetoCliente;
        $this->fechaIngreso = $fechaIngreso;
        $this->estado = $estado;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getTipoTramite()
    {
        return $this->tipoTramite;
    }
    public function getHorarioIngreso()
    {
        return $this->horarioIngreso;
    }
    public function getHorarioCierre()
    {
        return $this->horarioCierre;
    }
    public function getObjetoCliente()
    {
        return $this->objetoCliente;
    }
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }
    public function getEstado()
    {
        return $this->estado;
    }


    //set
    public function setTipoTramite($tipoTramite)
    {
        $this->tipoTramite = $tipoTramite;
    }
    public function setHorarioIngreso($horarioIngreso)
    {
        $this->horarioIngreso = $horarioIngreso;
    }
    public function setHorarioCierre($horarioCierre)
    {
        $this->horarioCierre = $horarioCierre;
    }
    public function setObjetoCliente($objetoCliente)
    {
        $this->objetoCliente = $objetoCliente;
    }
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    //redefinicion metodo __toString()
    public function __toString()
    {
        $ingreso = $this->getHorarioIngreso();
        $cierre = $this->getHorarioCierre();
        $mensaje =
        "Tipo de tramite: " . $this->getTipoTramite() . "\n". 
            "Horario ingreso: " . $ingreso["hora"] . ":" . $ingreso["minutos"] . "\n" .
            "Horario cierre: " . $cierre["hora"] . ":" . $cierre["minutos"] . "\n" .
            "Cliente----\n " . $this->getObjetoCliente() . "\n" .
            "Fecha ingreso: " . $this->getFechaIngreso() . "\n" .
            "Estado tramite: " . $this->getEstado() . "\n";
        return $mensaje;
    }

    //metodos nuevos
    //me parecio que los metodos de cantTramitesCerrados y abiertos tienen que tener como parametro un dni ya que se fijan los tramites cerrados/abiertos de un cliente, y para revisar todos los tramites, deberia poder acceder a un array de tramites y eso lo puedo hacer desde la clase Mostrador, desde acá no puedo acceder a eso
}
