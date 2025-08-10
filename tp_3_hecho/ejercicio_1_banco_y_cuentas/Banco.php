<?php
//no puse el ultimo valor de cuenta asignado porque en la clase cuenta pongo como atributo un nro cuenta que es auto incremental, entonces cada vez que hago un new de cuenta se genera un número único automáticamente
class Banco
{
    //atributos (variables instancia)
    private $arrayCtaCorriente; //coleccion de ctas corrientes de la clase CuentaCorriente
    private $arrayCajaAhorro; //coleccion de instancias dela clase CajaAhorro
    private $arrayObjCliente; //coleccion de instancias de la clase Cliente

    //metodo constructor
    public function __construct($arregloCtaCte, $arregloCjaAhorro, $arregloCliente)
    {
        $this->arrayCtaCorriente = $arregloCtaCte;
        $this->arrayCajaAhorro = $arregloCjaAhorro;
        $this->arrayObjCliente= $arregloCliente;
    }

    //metodos de accedo: getters  y setters
    //get 
    public function getArrayCtaCorriente()
    {
        return $this->arrayCtaCorriente;
    }
    public function getArrayCajaAhorro()
    {
        return $this->arrayCajaAhorro;
    }
    public function getArrayCliente()
    {
        return $this->arrayObjCliente;
    }

    //set 
    public function setArrayCtaCorriente($arregloCtaCte)
    {
        $this->arrayCtaCorriente = $arregloCtaCte;
    }
    public function setArrayCajaAhorro($arregloCjaAhorro)
    {
        $this->arrayCajaAhorro = $arregloCjaAhorro;
    }
    public function setArrayCliente($arregloCliente)
    {
        $this->arrayObjCliente = $arregloCliente;
    }

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

    public function __toString()
    {
        $mensaje =
            "Coleccion cuentas corrientes----\n" . $this->recorrerLosArreglos($this->getArrayCtaCorriente()) . "\n". 
            "Coleccion cajas de ahorro----\n" . $this->recorrerLosArreglos($this->getArrayCajaAhorro()) . "\n". 
            "Coleccion de clientes----\n" . $this->recorrerLosArreglos($this->getArrayCliente()) . "\n" ;
        return $mensaje;
    }
    
    //metodos nuevos

    /**
     *  permite agregar un nuevo cliente al Banco
    */
    public function incorporarCliente($objCliente){
        $arregloClientes = $this->getArrayCliente(); //recupero el arreglo de clientes
        //tengo que hacer un new de cliente?
        array_push($arregloClientes, $objCliente);
        $this->setArrayCliente($arregloClientes); //dejo seteado al arreglo con el nuevo objeto cliente
    }

    /**
     * permite agregar una nueva Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente del Banco.
    */
    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto){
        $arregloClientes = $this->getArrayCliente(); //recupero el arreglo de clientes
        $cantidadClientes = count($arregloClientes); //guardo la cantidad de elementos que están en ese arreglo
        $i=0; //contador
        $encontrado = false; //bandera en falso para poder parar el bucle

        while($i<$cantidadClientes && !$encontrado){
            $objCliente = $arregloClientes[$i]; //obtengo un cliente en especifico que va cambiando a medida que avanza el bucle
            $nroObjCliente = $objCliente->getNumeroCliente(); //acá recupero el numero de ese cliente
            if ($numeroCliente == $nroObjCliente){//comparo los nros de cliente
                $encontrado=true; //cambio la bandera porque encontré al cliente
                //cómo hago par agregar la nueva cuenta si para hacer un new de cuenta corriente no tengo algunos datos como saldo o nro de cuenta???
                $nuevaCtaCte = new Cuenta_Corriente($objCliente, null, $montoDescubierto); //puedo poner null?? en el test esto puede modificarse
                array_push($this->getArrayCtaCorriente(), $nuevaCtaCte);//hago el push con la nueva cuenta
                $this->setArrayCtaCorriente($this->getArrayCtaCorriente()); //realizo el seteo del arreglo de cuentas corrientes con la nueva cuenta
            }
            $i++;
        }
    }

    /**
     * metodo que agrega una nueva Caja de Ahorro a la colección de cajas de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco.
    */
    public function incorporarCajaAhorro($numeroCliente){
        $arregloClientes = $this->getArrayCliente(); //recupero el arreglo de clientes
        $cantidadClientes = count($arregloClientes); //guardo la cantidad de elementos que están en ese arreglo
        $i=0; //contador
        $encontrado = false; //bandera en falso para poder parar el bucle

        while($i<$cantidadClientes && !$encontrado){
            $objCliente = $arregloClientes[$i]; //obtengo un cliente en especifico que va cambiando a medida que avanza el bucle
            $nroObjCliente = $objCliente->getNumeroCliente(); //acá recupero el numero de ese cliente
            if ($numeroCliente == $nroObjCliente){//comparo los nros de cliente
                $encontrado=true; //cambio la bandera porque encontré al cliente
                $nuevaCajaAhorro =  new Caja_Ahorro($objCliente, null); //puedo poner null?? en el test esto puede modificarse
                array_push($this->getArrayCajaAhorro(), $nuevaCajaAhorro);
                $this->setArrayCajaAhorro($this->getArrayCajaAhorro()); //seteo el array de cjas de ahorro con la nueva cuenta
            }
            $i++;
        }
    }

    /**
     * dado un número de Cuenta y un monto, realizar depósito
    */
    public function realizarDeposito($numCuenta,$monto){
        //deberia juntar los dos arrays de cuentas y ahi recorrer hasta encontrar al nro de cuenta yahi uso el metodo realizar deposito ?
        $coleccionTotalCtas = array_merge($this->getArrayCajaAhorro(), $this->getArrayCtaCorriente()); //hago un merge de todas las cuentas 
        $cantidadCtas = count($coleccionTotalCtas); //guardo la cantidad de cuentas que hay en ese arreglo
        $i=0; //contador
        $encontrado = false; //bandera con false por defecto

        while(($i<$cantidadCtas) && !$encontrado){
            $objCuenta = $coleccionTotalCtas[$i]; //recupero un obj cuenta
            $objCuentaNroCta = $objCuenta->getNumeroCuenta(); //recupero el nro de cta de ese obj en particular 
            if ($numCuenta == $objCuentaNroCta){ //si coinciden, cambio la bandera y hago lo que pide el enunciado
                $objCuenta->realizarDeposito($monto); //el metodo retorna el monto actualizado del saldo+nueva plata
                $encontrado = true; //cambio el valor de la bandera
            }
        }
        $i++;
    }

    /**
     * dado un número de Cuenta y un monto, realizar retiro.
    */
    public function realizarRetiro($numCuenta,$monto){
      $coleccionTotalCtas = array_merge($this->getArrayCajaAhorro(), $this->getArrayCtaCorriente()); //hago un merge de todas las cuentas 
      $cantidadCtas = count($coleccionTotalCtas); //guardo la cantidad de cuentas que hay en ese arreglo
      $i=0; //contador
      $encontrado = false; //bandera con false por defecto

      while(($i<$cantidadCtas) && !$encontrado){
          $objCuenta = $coleccionTotalCtas[$i]; //recupero un obj cuenta
          $objCuentaNroCta = $objCuenta->getNumeroCuenta(); //recupero el nro de cta de ese obj en particular 
          if ($numCuenta == $objCuentaNroCta){ //si coinciden, cambio la bandera y hago lo que pide el enunciado
              $objCuenta->realizarRetiro($monto); //deberia fijarme que el metodo sea el que se hace en cada tipo de cta??
              $encontrado = true; //cambio el valor de la bandera
          }
      }
      $i++;
  }
}
