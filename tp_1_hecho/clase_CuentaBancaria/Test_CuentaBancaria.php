<?php
include_once 'CuentaBancaria.php';
//PROGRAMA PRINCIPAL
//int $nroCuenta, $dni, $intAnual, $opcion
//float $saldoAct, $cantidad, $resultado, $cant, $total
//string $respuesta

echo ">Ingrese el número de cuenta: \n";
$nroCuenta = trim(fgets(STDIN));
echo ">Ingrese el DNI del cliente: \n";
$dni = trim(fgets(STDIN));
echo ">Ingrese el saldo actual: \n";
$saldoAct = trim(fgets(STDIN));
echo ">Ingrese el interés anual: \n";
$intAnual = trim(fgets(STDIN));

$cliente1 = new CuentaBancaria($nroCuenta, $dni, $saldoAct, $intAnual);

echo "*------------------------------------------*\n";
echo ">Bienvenido.\n";
echo ">Desea ingresar al menú del cliente? (si-no)\n";
$respuesta = strtolower(trim(fgets(STDIN)));
if ($respuesta == "si") {
    do {
        echo ">>Elija una opción.\n";
        echo ">Opción 1: actualizar saldo con interés anual.\n";
        echo ">Opción 2: depositar dinero en la cuenta.\n";
        echo ">Opción 3: retirar dinero de la cuenta.\n";
        echo ">Opción 4: ver datos.\n";
        echo ">Opción 5: salir.\n";
        $opcion = trim(fgets(STDIN));
        switch ($opcion) {
            case '1':
                echo ">Su saldo actualizado es $" . $cliente1->actualizarSaldo() . "\n";
                break;
            case '2':
                echo ">Ingrese el monto a depositar: \n";
                $cantidad = (trim(fgets(STDIN)));
                $resultado = $cliente1->depositar($cantidad);
                if ($resultado == -1) {
                    echo ">No puede depositar una cantidad negativa o cero.\n";
                } else {
                    echo ">Su saldo es: $" . $resultado . "\n";
                }
                break;
            case '3':
                echo ">Ingrese el monto a retirar de su cuenta: \n";
                $cant = (trim(fgets(STDIN)));
                $total = $cliente1->retirar($cant);
                if ($total == -1) {
                    echo ">El saldo de su cuenta es insuficiente para hacer el retiro.\n";
                } else {
                    echo ">Su saldo quedó en: $" . $total . "\n";
                }
                break;
            case '4':
                echo $cliente1;
                break;
            case '5':
                echo ">Salió del menú cliente.\n";
                break;

            default:
                echo ">Opción incorrecta.\n";
                break;
        }
    } while ($opcion != 5);
} else {
    echo ">No ingresó al menú.";
}
