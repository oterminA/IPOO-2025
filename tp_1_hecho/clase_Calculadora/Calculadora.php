<?php
//Se necesita por lo menos dos parametros para poder realizar las operaciones
//Metodos:
// Suma numA + numB y viceversa
// Resta numA - numB, if numB 
// Multiplicacion numA * numB y viceversa
// Division numA / numB,if numB = 0 no se puede operar
//Enunciado:Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: + , - , *, /

class Calculadora {
    //definir las variables instancias:
    private $numero_a;
    private $numero_b;

    //crear los objetos con sus valores por parámetros:
    public function __construct($numA, $numB){
        if (is_numeric ($numA) && is_numeric ($numB) ) {
            $this->numero_a = $numA ;
            $this->numero_b = $numB ;
        }else{
        throw new ErrorException ("Los numeros A y B deben ser valores numéricos.\n");
    }
}

    //métodos de acceso para cada variable:
    public function getNumero_a(): float{
        return $this -> numero_a;
    }
    public function getNumero_b():float{
        return $this -> numero_b;
    }

    public function setNumero_a($numA): void{
        $this -> numero_a= $numA;
    }
    public function setNumero_b($numB): void{
        $this -> numero_b=$numB;
    }

    //metodos nuevos: sumar, restar, dividir, multiplicar:

    public function sumar():float{
        $suma = $this -> getNumero_a() + $this -> getNumero_b();
        return $suma;
    }
    public function restar():float{
        $resta = $this -> getNumero_a() - $this -> getNumero_b();
        return $resta;
    }
    public function multiplicar():float{
        $producto = $this -> getNumero_a() * $this -> getNumero_b();
        return $producto;
    }
    public function dividir():float{
        if ($this->getNumero_a()<> 0){
            $division = $this-> getNumero_a()/ $this->getNumero_b();
        } else{
            $division = -1; 
        }
        return $division;
    }

    //metodo __toString():
    public function __toString(){
        return "Numero A: " . $this -> getNumero_a() . "\nNumero B: " . $this-> getNumero_b();
    }

}

?>