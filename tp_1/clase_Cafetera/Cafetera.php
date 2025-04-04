<?php
/*    13. Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los siguientes métodos:
        13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la clase.
        13.b. Los método de acceso de cada uno de los atributos de la clase.
        13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
        13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se le sirvió un taza completa.
        13.e. vaciarCafetera(): pone la cantidad de café actual en cero.
        13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
        13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
        13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los métodos implementados.*/

        // 1litro = 1000cc

class Cafetera{
        //variables instacias
        private $capacidadMaxima;
        private $cantidadActual;

        //metodo constructor
        public function __construct($capMax, $cantAct){
                $this->capacidadMaxima = $capMax;
                $this->cantidadActual = $cantAct;
        }

        //observadoras
        public function getCapacidadMaxima(): int{
                return $this->capacidadMaxima;
        }
        public function getCantidadActual(): int{
                return $this->cantidadActual;
        }

        //modificadoras
        public function setCapacidadMaxima($capMax){
                $this->capacidadMaxima=$capMax;
        }
        public function setCantidadActual($cantAct){
                $this->cantidadActual=$cantAct;
        }

        //métodos nuevos
        /**
         * la cantidad actual debe ser igual a la capacidad de la cafetera
         * @return int 
        */
        public function llenarCafetera(){
                $cafLlena = -1;
                if ($this->getCantidadActual() == $this->getCapacidadMaxima()){                
                        $cafLlena = 1; //se llenó
                }
                return $cafLlena;
        }

        /**
         *simula la acción de servir una taza con la capacidad indicada. Si la cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se le sirvió un taza completa
         *@param int $cantidad
         *@return int
        */
        public function servirTaza($cantidad){
                //int $cantidadServida
                if ($cantidad > $this->getCantidadActual()) {
                    $cantidadServida = $this->getCantidadActual(); // Se sirve todo lo que queda
                    $this->setCantidadActual(0);
                } else {
                    $cantidadServida = $cantidad; // Se llena la taza con la cantidad solicitada
                    $this->setCantidadActual($this->getCantidadActual() - $cantidad);
                }
                return $cantidadServida;
            }
        
        /**
         * pone la cantidad de café actual en cero.
         * @return int
        */
        public function vaciarCafetera(){
                $this->setCantidadActual(0);
                return $this->getCantidadActual();
        }
        
        /**
         * añade a la cafetera la cantidad de café indicada.
         * @param int $cantidad
         * @return int
        */
        public function agregarCafe($cantidad){
                //int $agregado
                $agregado= $this->setCantidadActual($this->getCantidadActual() + $cantidad);
                return $agregado;
        }

        //redefinición metodo toString
        public function __toString(){
                $mensaje= ">La capacidad máxima de la cafetera es: " . $this->getCapacidadMaxima() . "cc.\n" . ">La cantidad actual de café en la cafetera es: " . $this->getCantidadActual() . "cc.\n";
                return $mensaje;
        }

}
?>