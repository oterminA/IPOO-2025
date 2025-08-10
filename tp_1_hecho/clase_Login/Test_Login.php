<?php
include_once 'Login.php';

//PROGRAMA PRINCIPAL
//int $contra, $opcion, $nuevaContra
//string $usuario, $frase, $rta
//array $arregloContrasenias

//pido datos al usuario
echo ">Ingrese su usuario:\n";
$usuario = trim(fgets(STDIN));

echo ">Ingrese su contraseña:\n";
$contra = trim(fgets(STDIN));

echo ">Ingrese la frase para recordar su contraseña:\n";
$frase = trim(fgets(STDIN));

$arregloContrasenias = [];
for ($i = 0; $i < 4; $i++) {
    echo ">Ingrese su " . ($i + 1) . " última contraseña:\n";
    $arregloContrasenias[$i] = trim(fgets(STDIN));
}

//le paso los datos al new Login
$ingreso1 = new Login($usuario, $contra, $frase, $arregloContrasenias);

//comienza el menú
echo "<------------------------------------>\n";
echo "Desea entrar al menú de usuario? (SI/NO)\n";
$rta = trim(fgets(STDIN));

if ($rta == "no" || $rta == "NO") {
    echo "No se ingresó al menú.\n";
} else {
    do {
        echo "Menú\n";
        echo "0: Recordar usuario.\n";
        echo "1: Validar contraseña.\n";
        echo "2: Cambiar contraseña.\n";
        echo "3: Mostrar datos guardados.\n";
        echo "4: Salir.\n";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case '0':
                echo "Ingrese su usuario para recordar su frase:\n";
                $usuario = trim(fgets(STDIN));
                $recuerdo = $ingreso1->recordar($usuario);
                if ($recuerdo === null){
                    echo "Error, usuario no reconocido. No se puede mostrar la frase.\n";
                }else {
                    echo "Su frase es: " . $frase . "\n";
                }
                break;
            case '1':
                echo "Ingrese nuevamente su contraseña:\n";
                $contra = trim(fgets(STDIN));
                if ($ingreso1->existeContrasenia($contra)) {
                    echo "Contraseña válida.\n";
                } else {
                    echo "Error, contraseña incorrecta. Intente otra vez.\n";
                }
                break;
            case '2':
                echo "Ingrese su nueva contraseña:\n";
                $nuevaContra = trim(fgets(STDIN));
                if (($ingreso1->contraseniaUsada($nuevaContra))) {
                    echo "Contraseña utilizada anteriormente. Intente con otra.\n";
                } else {
                    $ingreso1->cambioContrasenia($nuevaContra);
                    echo "Contraseña cambiada con éxito.\n";
                }
                break;
            case '3':
                echo $ingreso1;
                break;
            case '4':
                echo "Saliendo del menú.\n";
                break;
            default:
                echo "Opción inválida. Intente de nuevo.\n";
        }
    } while ($opcion != '4');
}
