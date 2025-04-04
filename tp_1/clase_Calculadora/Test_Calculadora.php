<?php
include_once 'Calculadora.php';
//PROGRAMA PRINCIPAL
//float $num1, $num2, $resDivision

echo "Ingrese los dos números con los que va a operar: \n";
$num1 = trim(fgets(STDIN));
$num2 = trim(fgets(STDIN));
$operacion_1 = new Calculadora($num1, $num2);
echo "La suma entre ambos números es: " . $operacion_1->sumar()  . "\n";
echo "La resta entre ambos números es: " . $operacion_1->restar() . "\n";
echo "La multiplicación entre ambos números es: " . $operacion_1->multiplicar() . "\n";
$resDivision = $operacion_1->dividir();
if ($resDivision == -1){
    echo "No se puede dividir entre cero.";
}else{
    echo "La división entre ambos numeros es: " . $operacion_1 ->dividir() ."\n";
}

echo $operacion_1;
    


?>