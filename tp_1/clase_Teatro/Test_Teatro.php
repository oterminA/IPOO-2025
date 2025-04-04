<?php
include_once 'Teatro.php';

echo "Nombre teatro:\n";
$nombre = trim(fgets(STDIN));
echo "Direccion teatro:\n";
$direccion = trim(fgets(STDIN));
for ($i=0; $i<2;$i++){
    echo "Nombre: funcion " . $i+1 . "\n";
        $funciones[$i]["nombre"]=trim(fgets(STDIN));
        echo "Precio entrada: \n" ;
        $funciones[$i]["precio"]=trim(fgets(STDIN));
}

$teatro1 = new Teatro ($nombre, $direccion, $funciones);


echo $teatro1;
$teatro1->mostrarFunciones();

?>