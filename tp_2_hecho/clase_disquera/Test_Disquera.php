<?php
include_once 'Disquera.php';
include_once 'Persona.php';

// horario de atención
$horaDesde = ["hora" => 15, "minutos" => 00];
$horaHasta = ["hora" => 21, "minutos" => 00];

// obj Persona como dueño
$objDueño = new Persona("Lionel", "Paez", "DNI", 21458987);

// obj Disquera
$objDisquera = new Disquera($horaDesde, $horaHasta, "abierto", "Lavalle 352", $objDueño);

// muestro info 
echo $objDisquera . "\n";

// verifico si está en horario de atención
$horarioAtencion = $objDisquera->dentroHorarioAtencion(12, 00);
echo $horarioAtencion ? ">La hora ingresada está dentro del horario de atención.\n" : ">La hora ingresada está fuera del horario de atención.\n"; //uso una ternaria en lugar de una alternativa

// intnto abrir la disquera a las 17:00
//no entiendo esta parte
$objDisquera->abrirDisquera(17, 00);
echo ">Estado luego de intentar abrir: " . $objDisquera->getEstadoTienda() . "\n";

// intento cerrar la disquera a las 23:30
//no entiendo esta parte
$objDisquera->cerrarDisquera(23, 30);
echo ">Estado luego de intentar cerrar: " . $objDisquera->getEstadoTienda() . "\n";
?>
