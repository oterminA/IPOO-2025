<?php
include_once 'CuentaBancaria2.php';
include_once 'Persona.php';

//capaz que es mejor usar nombres como $objPersona1, $objCuenta1
$persona1 = new Persona("Pipo", "Gomez", "DNI", 21546876);
$cuenta1= new CuentaBancaria(9870, $persona1, 20000000, 30);

//toString
echo $cuenta1;

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
                echo ">Su saldo actualizado es $" . $cuenta1->actualizarSaldo() . "\n";
                break;
            case '2':
                echo ">Ingrese el monto a depositar: \n";
                $cantidad = (trim(fgets(STDIN)));
                $resultado = $cuenta1->depositar($cantidad);
                if ($resultado == -1) {
                    echo ">No puede depositar una cantidad negativa o cero.\n";
                } else {
                    echo ">Su saldo es: $" . $resultado . "\n";
                }
                break;
            case '3':
                echo ">Ingrese el monto a retirar de su cuenta: \n";
                $cant = (trim(fgets(STDIN)));
                $total = $cuenta1->retirar($cant);
                if ($total == -1) {
                    echo ">El saldo de su cuenta es insuficiente para hacer el retiro.\n";
                } else {
                    echo ">Su saldo quedó en: $" . $total . "\n";
                }
                break;
            case '4':
                echo $cuenta1;
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


