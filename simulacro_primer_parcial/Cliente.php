<?php
class Cliente
{
    //atributos (variables instancias)
    private string $nombreCliente;
    private string $apellidoCliente;
    private bool $estadoBaja; 
    private int $tipoDocumento;
    private int $numeroDocumento;

    //metodo constructor
    public function __construct($nombre, $apellido, $baja, $tipoDoc, $nroDoc)
    {
        $this->nombreCliente = $nombre;
        $this->apellidoCliente = $apellido;
        $this->estadoBaja = $baja;
        $this->tipoDocumento = $tipoDoc;
        $this->numeroDocumento = $nroDoc;
    }

    //metodos de acceso: get y set
    //observadoras (get)
    public function getNombreCliente(): string
    {
        return $this->nombreCliente;
    }
    public function getApellidoCliente(): string
    {
        return $this->apellidoCliente;
    }
    public function getEstadoBaja(): bool
    {
        return $this->estadoBaja;
    }
    public function getTipoDocumento(): string
    {
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(): int
    {
        return $this->numeroDocumento;
    }

    //modificadoras (set)
    public function setNombreCliente($nombre)
    {
        $this->nombreCliente = $nombre;
    }
    public function setApellidoCliente($apellido)
    {
        $this->apellidoCliente = $apellido;
    }
    public function setEstadoBaja($baja)
    {
        $this->estadoBaja = $baja;
    }
    public function setTipoDocumento($tipoDoc)
    {
        $this->tipoDocumento = $tipoDoc;
    }
    public function setNumeroDocumento($nroDoc)
    {
        $this->numeroDocumento = $nroDoc;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            ">Nombre cliente: " . $this->getNombreCliente() . "\n" .
            ">Apellido cliente: " . $this->getApellidoCliente() . "\n" .
            ">Estado baja: " . $this->getEstadoBaja() . "\n" .
            ">Tipo documento: " . $this->getTipoDocumento() . "\n" .
            ">Numero de documento: " . $this->getNumeroDocumento() . "\n";
        return $mensaje;
    }
}
