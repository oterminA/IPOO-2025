<?php
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
        public function getCapacidadMaxima(){
                return $this->capacidadMaxima;
        }
        public function getCantidadActual(){
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
                return $cafLlena; //1=se lleno, -1 no se llenó
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
                $agregado = -1;
                if ($this->getCantidadActual() + $cantidad <= $this->getCapacidadMaxima()){
                        $this->setCantidadActual($this->getCantidadActual() + $cantidad);
                        $agregado = $this->getCantidadActual();
                }
                return $agregado; //si es -1 es porque no se agregó 
        }

        //redefinición metodo toString
        public function __toString(){
                $mensaje= 
                ">La capacidad máxima de la cafetera es de: " . $this->getCapacidadMaxima() . "cc.\n" . 
                ">La cantidad actual de café en la cafetera es: " . $this->getCantidadActual() . ".\n";
                return $mensaje;
        }

}
?>