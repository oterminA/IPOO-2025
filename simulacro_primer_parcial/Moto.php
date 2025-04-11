<?php
class Moto
{
    //variables instancia (atributos)
    private int $codigoMoto;
    private float $costoMoto;
    private int $anioFabricacion;
    private string $descripcionMoto;
    private float $porcentajeIncAnual;
    private bool $motoActiva;

    //metodo constructor
    public function __construct($codigo, $costo, $anioF, $descripcionM, $porcentajeInc, $activa)
    {
        $this->codigoMoto = $codigo;
        $this->costoMoto = $costo;
        $this->anioFabricacion = $anioF;
        $this->descripcionMoto = $descripcionM;
        $this->porcentajeIncAnual = $porcentajeInc;
        $this->motoActiva = $activa;
    }

    //metodos de acceso: get y set
    //observadoras (get)
    public function getCodigoMoto(): int
    {
        return $this->codigoMoto;
    }
    public function getCostoMoto(): float
    {
        return $this->costoMoto;
    }
    public function getAnioFabricacion(): int
    {
        return $this->anioFabricacion;
    }
    public function getDescripcionMoto(): string
    {
        return $this->descripcionMoto;
    }
    public function getPorcentajeIncAnual(): float
    {
        return $this->porcentajeIncAnual;
    }
    public function getMotoActiva(): bool
    {
        return $this->motoActiva;
    }

    //modificadoras (set)
    public function setCodigoMoto($codigo)
    {
        $this->codigoMoto = $codigo;
    }
    public function setCostoMoto($costo)
    {
        $this->costoMoto = $costo;
    }
    public function setAnioFabricacion($anioF)
    {
        $this->anioFabricacion = $anioF;
    }
    public function setDescripcionMoto($descripcionM)
    {
        $this->descripcionMoto = $descripcionM;
    }
    public function setPorcentajeIncAnual($porcentajeInc)
    {
        $this->porcentajeIncAnual = $porcentajeInc;
    }
    public function setMotoActiva($activa)
    {
        $this->motoActiva = $activa;
    }

    //redefinicion del metodo __toString()
    public function __toString()
    { //esto se pone al final o donde lo dice el enunciado????
        $mensaje =
            ">Codigo moto: " . $this->getCodigoMoto() . "\n" .
            ">Costo moto: $" . $this->getCostoMoto() . "\n" .
            ">Año fabricacion: " . $this->getAnioFabricacion() . "\n" .
            ">Descripcion: " . $this->getDescripcionMoto() . "\n" .
            ">Porcentaje incremento anual: " . $this->getPorcentajeIncAnual() . "%\n" .
            ">Moto activa: " . $this->getMotoActiva() . "\n";
        return $mensaje;
    }


    /////
    //metodo nuevo
    /**
     * este método calcula el valor por el cual puede ser vendida una moto.
     * @return float $venta
     */
    public function darPrecioVenta()
    {
        //Int $anioActual, $aniosTranscurridos
        $anioActual = 2025;

        if ($this->getMotoActiva()) {
            $aniosTranscurridos = $anioActual - $this->getAnioFabricacion();

            $venta = $this->getCostoMoto() + $this->getCostoMoto() * ($aniosTranscurridos * $this->getPorcentajeIncAnual());
        } else {
            $venta = -1; //significa que la moto no es activa
        }
        return $venta;
    }
}
