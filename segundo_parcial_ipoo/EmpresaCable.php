<?php
class EmpresaCable{
    //atributos (variables instancia)
    private $arregloPlanes;
    private $arregloCanales;
    private $arregloContratos;

    //metodo constructor
    public function __construct($arrayPlanes, $arrayCanales, $arrayContratos)
    {
        $this->arregloPlanes=$arrayPlanes;   
        $this->arregloCanales=$arrayCanales;   
        $this->arregloContratos=$arrayContratos;   
    }

    //metodos de accedo: getters  y setters
    //get
    public function getArrayPlanes(){
        return $this->arregloPlanes;
    }
    public function getArrayCanales(){
        return $this->arregloCanales;
    }
    public function getArrayContratos(){
        return $this->arregloContratos;
    }

    //set
    public function setArrayPlanes($arrayPlanes){
        $this->arregloPlanes=$arrayPlanes;
    }
    public function setArrayCanales($arrayCanales){
        $this->arregloCanales=$arrayCanales;
    }
    public function setArrayContratos($arrayContratos){
        $this->arregloContratos=$arrayContratos;
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

    //redefinicion metodo __toString()
    public function __toString()
    {
        $mensaje = 
        "Coleccion de planes----\n " . $this->recorrerLosArreglos($this->getArrayPlanes()) . "\n" . 
        "Coleccion de planes----\n" . $this->recorrerLosArreglos($this->getArrayCanales()) . "\n" . 
        "Coleccion de planes----\n" . $this->recorrerLosArreglos($this->getArrayContratos()) . "\n" ;
        return $mensaje;
    }

    //metoods nuevos
        /**
     * Implementar la función BuscarContrato que  recibe un tipo y numero de documento correspondiente a un cliente y retorna el contrato 
     * que tiene el cliente con la empresa. Si no existe ningún contrato el método retorna un valor nulo.
    */
    public function buscarContrato($tipoDoc, $nroDoc){
        $colContratos = $this->getArrayContratos();//guardo el array de contratos
        $i=0;
        $cantidadContratos = count($colContratos); //cantidad contratos
        $encontrado = false;//bandera
        $contrato = null; //valor por defecto

        while(($i<$cantidadContratos) && !$encontrado){
            $objContrato = $colContratos[$i]; //recupero un obj contrato
            $objCliente = $objContrato->getObjetoCliente(); //recupero un obj cliente
            $tipoDocObjCliente = $objCliente->getTipoDocumento();
            $nroDocObjCliente = $objCliente->getNumeroDocumento();

            if (($tipoDoc == $tipoDocObjCliente) && ($nroDoc == $nroDocObjCliente)){
                $contrato = $objContrato;
                $encontrado = true;
            }
        $i++;
    }
        return $contrato; //retorna el contrato en cuestion o null    
    }

    /**
     * Implementar la función incorporarPlan que incorpora a la colección de planes un nuevo plan siempre y cuando no haya un plan con 
     * los mismos canales y los mismos MG (en caso de que el plan incluyera).
    */
    public function incorporarPlan($planNuevo){
        $colPlanes = $this->getArrayPlanes(); //guardo el array de planes
        $i=0;
        $cantidadPlanes = count($colPlanes); //cantidad planes
        $encontrado = false;//bandera

        while(($i<$cantidadPlanes) && !$encontrado){
            $objPlan = $colPlanes[$i]; //recupero un obj 
            $canales = $objPlan->getArrayCanalesOfrece(); //recupero el array de canales
            $megas = $objPlan ->getIncluyeONoMG(); //guardo los megas
            
            $canalesPlanNuevo= $plan->getArrayCanalesOfrece(); //recupero el array de canales
            $megasPlanNuevo = $plan ->getIncluyeONoMG(); //guardo los megas

            if (($megas <> null) && ($megasPlanNuevo <> null)){ //para verificar que si tenga megas
            if (($canales !== $canalesPlanNuevo) && ($megas!==$megasPlanNuevo)){
                array_push($colPlanes, $planNuevo); 
                $this->setArrayPlanes($colPlanes); //seteo el arreglo de planes con el nuevo
                $encontrado = true; //cambio la bandera
            }

            }

        $i++;
    }
    }

    /**
     * Implementar la función incorporarContrato: que recibe por parámetro el plan, una referencia al cliente, la fecha de inicio y de 
     * vencimiento del mismo y si se trata de un contrato realizado en la empresa o vía web (si el valor del parámetro es True se trata de un 
     * contrato realizado vía web). El método corrobora que no exista un contrato previo con el cliente, en caso de existir y encontrarse activo 
     * se debe dar de baja. Por política de la empresa, solo existe la posibilidad de tener un contrato activo con un cliente determinado.
    */
    public function incorporarContrato($objPlan, $objCliente, $inicio, $vencimiento, $tipoContrato){
        $colContratos = $this->getArrayContratos(); //guardo los contratos
        $i=0;
        $encontrado = false;
        $cantidadContratos = count($colContratos);

        while ($i<$cantidadContratos && !$encontrado){
            $objContrato = $colContratos[$i]; //recupero obj contrato
            $plan = $objContrato->getPlan();
            $cliente = $objContrato->getObjetoCliente();
            $fechaInicio = $objContrato->getFechaInicio();
            $fechaVencimiento = $objContrato->getFechaVencimiento();


            if (($plan!== $objPlan) && ($cliente!==$objCliente) && ($fechaInicio !== $inicio) && ($fechaVencimiento !== $vencimiento)){
                $nuevoContrato = new ContratosPlanes(null, $inicio, $vencimiento, $objPlan, null, null, null, $objCliente); //no dispongo de la informacion para completar el new de Contrato
                array_push($colContratos, $nuevoContrato);
                $this->setArrayContratos($colContratos); //seteo el array con el nuevo contrato
                $encontrado = true; //cambio la bandera
            }
            $i++;
        }
    }    

    /**
     * Implementar la función  retornarPromImporteContratos que recibe por parámetro el código de un plan y retorna el promedio de los 
     * importes de los contratos realizados usando ese plan.
    */
    public function retornarPromImporteContratos($codigo){
        $colContratos = $this->getArrayContratos();
        $i=0;
        $cantidadContratos = count($colContratos);
        $encontrado=false;
        $suma = 0;
        $contrato = 0;
        while (($i<$cantidadContratos) && !$encontrado){
            $objContrato = $colContratos[$i];
            $objPlan = $objContrato->getPlan();
            $codigoObjPlan = $objPlan->getCodigoPlan();

            if ($codigoObjPlan == $codigo){
                $encontrado=true; 
                $importe= $objPlan->getImporte();
                $suma = $suma + $importe;
                $contrato++;
            }
            $i++;
        }
        
        if($contrato>0){ //para evitar la division por cero
            $promedio = $suma / $contrato; // como dice de los contratos usando ese plan, no uso la cantidad de contratos, sino las veces que el contador de contrato devuelve
        }
        return $promedio;
    }



    /**
     * Implementar la función pagarContrato: que recibe como parámetro el código de un contrato, actualiza el estado del contrato y retorna 
     * el importe final que debe ser abonado por el cliente.
    */
    public function pagarContrato($codigoContrato){
        $colContratos = $this->getArrayContratos();
        $i=0;
        $cantidadContratos = count($colContratos);
        $encontrado=false;
        while (($i<$cantidadContratos) && !$encontrado){
            $objContrato = $colContratos[$i];
            $codigoObjContrato = $objContrato->getCodigoContrato();
            if ($codigo == $codigoObjContrato){
                $estadoCliente = $objContrato->getEstadoCliente();
                
            }

            $i++;
        }
        
    }
}