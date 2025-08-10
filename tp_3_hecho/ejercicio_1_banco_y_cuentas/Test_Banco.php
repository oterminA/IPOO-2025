<?php
include_once 'Cliente.php';
include_once 'Persona.php';
include_once 'Cuenta.php';
include_once 'Cuenta_Corriente.php';
include_once 'Caja_Ahorro.php';
include_once 'Banco.php';
/*. Implemente una clase TestBanco que realice las siguientes operaciones:*/

// 2. Crear dos nuevos clientes Cliente1 y Cliente2, y agregarlos al banco
$cliente1 = new Cliente("Carina", "Sanchez", 36587412, "00698");
$cliente2 = new Cliente("Mariano", "Ramirez", 25698563, "01478");

// 3. Crear dos Cuentas Corrientes, una asociada a cada cliente
$objCtaCte1 = new Cuenta_Corriente($cliente1, 1500000, 500000);
$objCtaCte2 = new Cuenta_Corriente($cliente2, 2000000, 1000000);


// 4. Crear tres Cajas de Ahorro: dos para Cliente1 y una para Cliente2
$objCjaAhorro1 = new Caja_Ahorro($cliente1, 1000000);
$objCjaAhorro2 = new Caja_Ahorro($cliente1, 1500000);
$objCjaAhorro3 = new Caja_Ahorro($cliente2, 2000000);

// 1. Crear un objeto de la clase Banco
$objBanco = new Banco([$objCtaCte1, $objCtaCte2], [$objCjaAhorro1, $objCjaAhorro2, $objCjaAhorro3],[$cliente1, $cliente2]);

###
echo "---DATOS BANCO---\n";
echo $objBanco;
###


// 5. Depositar $300 en cada una de las Cajas de Ahorro
$saldo = $objCjaAhorro1->getSaldoCuenta();
echo ">Su saldo actual es de: $" . $saldo . "\n";
$depositar = $objCjaAhorro1->realizarDeposito(300);
echo ">El dinero fue depositado. Su saldo luego del deposito es de: $" . $objCjaAhorro1-> getSaldoCuenta() . "\n";


// 6. Transferir $150 de la Cuenta Corriente de Cliente1 a la Caja de Ahorro de Cliente2
$saldo = $objCtaCte1->getSaldoCuenta();
echo ">El saldo actual de la cuenta corriente 1 es de: $" . $saldo . "\n";
$saldo = $objCjaAhorro3->getSaldoCuenta();
echo ">El saldo actual de la caja de ahorro 3 es de: $" . $saldo . "\n";
$retirarCliente1 = $objCtaCte1->realizarRetiro(150);
$depositarCliente2 = $objCjaAhorro3->realizarDeposito(150);
echo ">Transferencia exitosa. El saldo actual de la cuenta corriente 1 es de: $" . $objCtaCte1->getSaldoCuenta() . "\n El saldo actual de la caja de ahorro 3 es de: $" . $objCjaAhorro3->getSaldoCuenta(). "\n";

// 7. Mostrar los datos de todas las cuentas
echo "\n---DATOS ACTUALIZADOS DEL BANCO---\n";
echo $objBanco;

