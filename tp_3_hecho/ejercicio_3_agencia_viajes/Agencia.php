<?php
/*Implementar la clase Agencia que contiene una colección de paquetes turísticos, la colección de ventas realizadas por la agencia y la colección de ventas On-Line. La clase cuenta con los siguientes métodos:
a) incorporarPaquete(objPaqueteTuristico) :que incorpora a la colección de paquetes turísticos un nuevo paquete a la agencia siempre y cuando no haya un paquete en la misma fecha al mismo destino. Si el paquete pudo ser ingresado el método debe retornar true y false en caso contrario.
b) incorporarVenta(objPaquete,tipoDoc,numDoc,cantPer, esOnLine): método que recibe por parámetro el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el paquete turístico y si se trata o no de una venta on-line (valor true o false). El método retorna el importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso contrario
c) informarPaquetesTuristicos(fecha,destino): método que retorna una colección con todos los paquetes que se realizan en una fecha y a un destino. //no se contradice con el punto a?
d) paqueteMasEcomomico(fecha,destino): método que retorna el paquete turístico mas económico para una fecha y un destino.
e) informarConsumoCliente(tipoDoc,numDoc): método que retorna todos los paquetes que fueron utilizados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro.
f) informarPaquetesMasVendido(anio, n): retorna los n paquetes turísticos mas vendido en el año recibido por parámetro
g) promedioVentasOnLine(): método que retorna el promedio de ventas on-line realizadas por la agencia.
h) promedioVentasAgencia(): método que retorna el promedio de ventas (on-line?) realizadas por la agencia.*/
class Agencia
{
    //atributos (variables instancia)
    private $arrayPaquetesTuristicos; //coleccion de paquetes de la clase Paquetes
    private $arrayVentas; //coleccion de ventas realizadas de la clase Ventas
    private $arrayVentasOnline; //coleccion de ventas online de la clase Online

    //metodo constructor
    public function __construct($arregloPaquetes, $arregloVentas, $arregloOnline)
    {
        $this->arrayPaquetesTuristicos = $arregloPaquetes;
        $this->arrayVentas = $arregloVentas;
        $this->arrayVentasOnline = $arregloOnline;
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayPaquetes()
    {
        return $this->arrayPaquetesTuristicos;
    }
    public function getArrayVentas()
    {
        return $this->arrayVentas;
    }
    public function getArrayOnline()
    {
        return $this->arrayVentasOnline;
    }

    //set
    public function setArrayPaquetes($arregloPaquetes)
    {
        $this->arrayPaquetesTuristicos = $arregloPaquetes;
    }
    public function setArrayVentas($arregloVentas)
    {
        $this->arrayVentas = $arregloVentas;
    }
    public function setArrayOnline($arregloOnline)
    {
        $this->arrayVentasOnline = $arregloOnline;
    }


    /**
     * funcion para poder recorrer los array de objetos y asi mostralos en el toString como cadena de caracteres 
     */
    public function recorrerLosArreglos($arreglo)
    {
        $mensaje = "";
        $cantidadArreglo = count($arreglo);
        if ($cantidadArreglo == 0) {
            $mensaje = "Arreglo sin elementos. \n";
        } else {
            for ($i = 0; $i < $cantidadArreglo; $i++) {
                $mensaje = $mensaje . "Elemento N°" . $i + 1 . ": " . $arreglo[$i] . "\n";
            }
        }
        return $mensaje;
    }

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje =
            "Coleccion de paquetes turisticos----\n " . $this->recorrerLosArreglos($this->getArrayPaquetes()) . "\n" .
            "Coleccion de ventas realizadas----\n" . $this->recorrerLosArreglos($this->getArrayVentas()) . "\n" .
            "Coleccion de ventas online---\n" . $this->recorrerLosArreglos($this->getArrayOnline()) . "\n";
        return $mensaje;
    }

    //metodos nuevos
    /**
     * metodo que incorpora a la colección de paquetes turísticos un nuevo paquete a la agencia siempre y cuando no haya un paquete en la misma fecha al mismo destino. Si el paquete pudo ser ingresado el método debe retornar true y false en caso contrario.
     */
    public function incorporarPaquete($objPaqueteTuristico)
    {
        $coleccionPaquetes = $this->getArrayPaquetes(); //guardo la coleccion de paquetes turisticos

        //guardo los datos del paquete que tengo que buscar (el que entró por parametro), en variables diferentes para que sea más legible el codigo
        $fechaObjPaqueteTuristico = $objPaqueteTuristico->getFechaDesde(); //recupero la fecha del paquete ingresado por parametro
        $objDestino = $objPaqueteTuristico->getObjetoDestino(); //guardo el obj destino que obtengo mediante: clase Paquete->clase Destino
        $destinoObjPaqueteTuristico = $objDestino->getNombreDestino(); // recupero el nombre del destino del paquete ingresado por parametro

        $i = 0; //contador
        $ingresado = false; //valor por defecto que despues puede cambiar según pueda ser ingresado el paquete
        $cantidadPaquetes = count($coleccionPaquetes); //guardo la cantidad de paquetes dentro de la coleccion de estos
        while (($i < $cantidadPaquetes) && (!$ingresado)) {
            //abajo guardo los datos de destino y fecha de un paquete en especifico que NO es el del parametro para poder compararlos
            $unPaquete = $coleccionPaquetes[$i]; //guardo un obj paquete que va a ir cambiando a medida de que el bucle avance
            $fechaUnPaquete = $unPaquete->getFechaDesde(); //recupero la fecha de ese paquete
            $unDestino = $unPaquete->getObjetoDestino(); //guardo el obj destino de ese paquete para poder usarlo despues
            $destinoUnPaquete = $unDestino->getNombreDestino(); // recupero el nombre del destino de ese paquete

            //ahora que tengo los datos de ambos paquetes, los comparo y si NO coinciden, ingreso el paquete del parametro
            if (($destinoObjPaqueteTuristico !== $destinoUnPaquete) && ($fechaObjPaqueteTuristico !== $fechaUnPaquete)) {
                $ingresado = true; //cambio el boolean porque si lo tengo que ingresar ya que no coinciden
                array_push($coleccionPaquetes, $objPaqueteTuristico); //agrego el objPaquete a la coleccion
                $this->setArrayPaquetes($coleccionPaquetes); //seteo la coleccion
            }
            $i++; //aumento el contador para que itere el bucle
        }
        return $ingresado; //retorna true si el paquete pudo ser ingresado (o sea que los datos no se repetian), o false no pudo ingresarse (se repetian los datos de destino y fecha)
    }

    /**
     * método que recibe por parámetro el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el paquete turístico y si se trata o no de una venta on-line (valor true o false). El método retorna el importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso contrario
     */
    public function incorporarVenta($objPaquete, $objCliente, $cantPer, $esOnline)
    {
        $coleccionVentas = $this->getArrayVentas(); //guardo las ventas normales
        $coleccionVentasOnline = $this->getArrayOnline(); //guardo las ventas online
        $plazasDisponibles = $objPaquete->getPlazasDisponibles();
        $fecha = date('d-m-y'); //para poder agregar a la instancia venta
        $importe = -1; //valor por defecto

        if ($cantPer <= $plazasDisponibles) { //si la cantidad gente es menor o igual a los lugares disponibles
            if ($esOnline) { //o sea la venta es online, en esta condicion evaluo eso
                $ventaOnline = new Online($fecha, $objPaquete, $cantPer, $objCliente); //nueva instancia de venta
                array_push($coleccionVentasOnline, $ventaOnline); //agrego esa venta al arreglo de online
                $this->setArrayOnline($coleccionVentasOnline); //hago el set de esa coleccion
                $importe = $ventaOnline->darImporteVenta(); //guardo el importe de la venta online
            } else { //acá evaluo si la venta es normal
                $ventaNormal = new Ventas($fecha, $objPaquete, $cantPer, $objCliente); //new de Ventas
                array_push($coleccionVentas, $ventaNormal); //hago el array push, ingresando esa nueva venta al arreglo
                $this->setArrayVentas($coleccionVentas); //seteo el arreglo
                $importe = $ventaNormal->darImporteVenta();
            }
            $plazasSobran = $plazasDisponibles - $cantPer; //hago el calculo de cuantos lugares sobran
            $objPaquete->setPlazasDisponibles($plazasSobran); //seteo actualizando los lugares sobrantes
        }
        return $importe; //valor de la venta o -1 porque no pudo realizarse
    }


    /**
     * método que retorna una colección con todos los paquetes que se realizan en una fecha y a un destino.
     */
    public function informarPaquetesTuristicos($fecha, $destino)
    {
        $coleccionPaquetes = $this->getArrayPaquetes(); //guardo la coleccion de paquetes
        $coleccionPaqueteEspecifico = []; //array inicializado vacio de los paquetes que coincidan con los parametros

        foreach ($coleccionPaquetes as $objPaquete) {
            $unDestino = $objPaquete->getObjetoDestino(); //guardo el obj destino para poder acceder en la linea siguiente
            $destinoObjPaquete = $unDestino->getNombreDestino(); // recupero el nombre del destino del obj paquete
            $fechaObjPaquete = $objPaquete->getFechaDesde(); //recupero la fecha del obj paquete

            if (($fecha == $fechaObjPaquete) && ($destino == $destinoObjPaquete)) { //comparo y si son iguales lo meto en el arreglo 
                array_push($coleccionPaqueteEspecifico, $objPaquete); //guardo el obj paquete en el array nuevo, no seteo porque es un arreglo nuevo, que no tiene que ver con los que tienen metodos de acceso
            }
        }
        return $coleccionPaqueteEspecifico; //retorna el arreglo con elementos dentro que coinciden con los parametros, o vacío porque no se encontró ninguna coincidencia
    }

    /**
     * método que retorna el paquete turístico mas económico para una fecha y un destino.
     */
    public function paqueteMasEcomomico($fecha, $destino)
    {
        $coleccionPaquetes = $this->informarPaquetesTuristicos($fecha, $destino); //guardo el array de paquetes que coinciden con esos parametros, para eso uso el metodo anterior
        $paqueteMasEconomico = [];
        $precioMasEconomico = 999999999999999999; //variable con la que voy a ir comparando y guardando el valor más economico

        foreach ($coleccionPaquetes as $objPaquete) {
            $dias = $objPaquete->getCantidadDias(); //guardo la cantidad de dias
            $objDestino = $objPaquete->getObjetoDestino(); //recupero el obj destnio
            $precioXDia = $objDestino->getValorPorDia(); //recupero el valor x dia del obj destino
            $total = ($precioXDia * $dias); //realizo la operacion

            if ($total < $precioMasEconomico) {
                $precioMasEconomico = $total; //esto va a permitir que se evalue todo el tiempo cuál es el más economico (y se vaya reemplazando por el que si lo es)
                $paqueteMasEconomico = $objPaquete; //acá voy guardando el paquete que si corresponde con ser el más economico
            }
        }
        return $paqueteMasEconomico; //devuelve vacio porque ninguno es el más economico (?aunque siempre va a haber alguno más economico que otro?) o el paquete más economico
    }

    /**
     * método que retorna todos los paquetes que fueron utilizados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro.
     */
    public function informarConsumoCliente($tipoDoc, $numDoc)
    {
        //de ventas--> cliente
        $coleccionVentasNormales = $this->getArrayVentas(); //guardo el array de ventas normales
        $coleccionVentasOnline = $this->getArrayOnline(); //guardo el array de ventas online
        $coleccionPaquetesCliente = []; //arreglo vacio en el que voy a poner los paquetes usados por ese cliente (si es que hay)
        $todasLasVentas = array_merge($coleccionVentasNormales, $coleccionVentasOnline);

        foreach ($todasLasVentas as $objVenta) {
            $objCliente = $objVenta->getObjClienteVenta(); //recupero al obj cliente
            $tipoDocObjCliente = $objCliente->getTipoDocumento(); //recupero el tipo doc
            $dniObjCliente = $objCliente->getNumeroDocumento(); //recupero el dni
            if (($tipoDoc == $tipoDocObjCliente) && ($numDoc == $dniObjCliente)) {
                $objPaquete = $objVenta->getObjetoPaquete(); //recupero al obj paquete de ese cliente
                array_push($coleccionPaquetesCliente, $objPaquete); //agrego ese paquete a la coleccion
            }
        }
        return $coleccionPaquetesCliente; //retorna un arreglo vacio o la coleccion llena de los paquetes de ese cliente
    }

    /**
     * retorna los n paquetes turísticos mas vendido en el año recibido por parámetro
     */
    public function informarPaquetesMasVendido($anio, $n)
    {
        $colPaquetes = $this->getArrayPaquetes();
        $ventasXPaquete = [];
        $colN = [];
        $i = 0;
    
        foreach ($colPaquetes as $paquete) {
            $fecha = $paquete->getFechaDesde(); 
            $partes = explode("/", $fecha);
            $anioPaquete = $partes[2];
    
            if ($anio == $anioPaquete) {
                $id = $paquete->getId();
                if (!isset($ventasXPaquete[$id])) {
                    $ventasXPaquete[$id] = [
                        "paquete" => $paquete,
                        "cantidad" => 1
                    ];
                } else {
                    $ventasXPaquete[$id]["cantidad"]++;
                }
            }
        }
    
        $ventasXPaquete = $this->ordenarArregloDesc($ventasXPaquete);
    
        $ventasXPaquete = array_values($ventasXPaquete); //para poder recorrer el arreglo con while porque no tiene indices numericos
    
        $total = count($ventasXPaquete);
        while ($i < $n && $i < $total) {
            array_push($colN, $ventasXPaquete[$i]["paquete"]);
            $i++;
        }
    
        return $colN; 
    }
    
    

    /**
     * método que retorna el promedio de ventas realizadas por la agencia.
     * (entiendo que es un conteo monetario, saber el promedio de costos, no de cantidad)
     */
    public function promedioVentasOnline()
    {
        $coleccionVentasOnline = $this->getArrayOnline(); //guardo la coleccion de ventas online
        $suma = 0;
        $promedio = 0;
        $cantidadVentas = count($coleccionVentasOnline); //guardo la cantidad de ventas dentro de esa coleccion
        foreach ($coleccionVentasOnline as $objVenta) {
            $importe = $objVenta->darImporteVenta(); //recupero el importe de la venta de ese obj venta
            $suma = $suma + $importe;
        }

        if ($cantidadVentas > 0) { //o sea HAY ventas, esto lo hago para evitar divisiones por cero
            $promedio = $suma / $cantidadVentas;
        }
        return $promedio; //float


        /*en caso de que se necesite saber el promedio, el numero de ventas online sobre las ventas totales:
        tengo que hacer la suma para saber las ventas totales, o sea las ventas hechas x la agencia y las ventas online, despues saco la cantidad de las ventas online y hago el calculo del promedio
           $colVentasAgencia = $this->getArrayVentas();
           $cantAgencia = count($colVentasAgencia);
           $colVentasOnline = $this->getArrayOnline();
           $cantOnline = count($colVentasOnline);
           $cantidadTotal = $cantAgencia + $cantOnline; //total de ventas
   
           if ($cantidadTotal >0){//para evitar la division por cero   
               $promedio = $cantOnline / $cantidadTotal;
           }
           return $promedio; //int o float del promedio
       }*/
    }


    /**
     * método que retorna el promedio de ventas on-line realizadas por la agencia
     */
    public function promedioVentasAgencia()
    {
        $colVentasAgencia = $this->getArrayVentas(); //guardo la coleccion de ventas online
        $suma = 0;
        $promedio = 0;
        $cantidad = count($colVentasAgencia); //guardo la cantidad de ventas dentro de esa coleccion
        foreach ($colVentasAgencia as $objVenta) {
            $importe = $objVenta->darImporteVenta(); //recupero el importe de la venta de ese obj venta
            $suma = $suma + $importe;
        }

        if ($cantidad > 0) { //o sea HAY ventas, esto lo hago para evitar divisiones por cero
            $promedio = $suma / $cantidad;
        }
        return $promedio; //float


        /*en caso de que se necesite saber el promedio, el numero de ventas online sobre las ventas totales:
        tengo que hacer la suma para saber las ventas totales, o sea las ventas hechas x la agencia y las ventas online, despues saco la cantidad de las ventas online y hago el calculo del promedio
           $colVentasAgencia = $this->getArrayVentas();
           $cantAgencia = count($colVentasAgencia);
           $colVentasOnline = $this->getArrayOnline();
           $cantOnline = count($colVentasOnline);
           $cantidadTotal = $cantAgencia + $cantOnline; //total de ventas
   
           if ($cantidadTotal >0){//para evitar la division por cero   
               $promedio = $cantAgencia / $cantidadTotal;
           }
           return $promedio; //int o float del promedio
       }*/
    }


    /**
     * funcionque ordena de forma descendiente un arreglo q entra por parametro
    */
    public function ordenarArregloDesc($array)
    {
        $ordenado = $array;
    
        uasort($ordenado, function ($a, $b) {
            return $b["cantidad"] - $a["cantidad"];
        });
    
        return $ordenado; // único return al final
    }

}
