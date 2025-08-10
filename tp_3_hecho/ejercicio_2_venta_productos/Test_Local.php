<?php

//no funciona algo y no sé que es!! HELP

include_once 'Cliente.php';
include_once 'Local.php';
include_once 'Producto.php';
include_once 'Productos_Importados.php';
include_once 'Productos_Regionales.php';
include_once 'Ventas.php';
include_once 'Rubro.php';

/*Implementar un script Test_ Local donde:*/
//• Se crean 2 rubros: conservas con un 35 % de ganancia, regalos con un 55 % de ganancia. 
$objRubro1 = new Rubro("Conservas", 35);
$objRubro2 = new Rubro("Regaleria", 55);

//• Se crean 4 instancias de la clase Producto y se vinculan a los rubros creados en el inciso anterior. 
$objProducto1 = new Productos_Regionales(25478, "Dulce de leche artesanal", 10, 21, 500, $objRubro1, 20);
$objProducto2 = new Productos_Regionales(48712, "Vino malbec reserva", 5, 21, 1500, $objRubro1,30);
$objProducto3 = new Productos_Importados(30215, "Queso gouda importado", 20, 10.5, 2200, $objRubro2);
$objProducto4 = new Productos_Importados(36597, "Chocolate suizo", 15, 21, 1800, $objRubro2);


//• Se incorpora cada instancia de la clase Producto a la Tienda.
$objCliente1 = new Cliente("Marina", "Dominguez", "DNI", 21582654);
$objCliente2 = new Cliente("Lorenzo", "Mendez", "DNI", 30753148);
$objCliente3 = new Cliente("Pablo", "Salas", "DNI", 18745963);


$objVentas1 = new Ventas("14/07/2024", [$objProducto1, $objProducto2], $objCliente1);
$objVentas2 = new Ventas("02/12/2023", [$objProducto2, $objProducto3], $objCliente2);
$objVentas3 = new Ventas("18/06/2025", [$objProducto3, $objProducto4], $objCliente3);


$objLocal = new Local([$objProducto3, $objProducto4], [$objProducto1, $objProducto2], [$objVentas1, $objVentas2, $objVentas3]);

//• Se incorpora nuevamente la última instancia de producto incorporada a la tienda y visualizar el resultado. 
echo "---DATOS LOCAL ---\n";
echo $objLocal;

//• Se retorna el precio de venta de cada uno de los productos creados. 
$venta = $objProducto1->darPrecioVenta();
echo ">Precio venta producto 1: $". $venta. "\n";

$venta = $objProducto2->darPrecioVenta();
echo ">Precio venta producto 2: $". $venta. "\n";

$venta = $objProducto3->darPrecioVenta();
echo ">Precio venta producto 3: $". $venta. "\n";

$venta = $objProducto4->darPrecioVenta();
echo ">Precio venta producto 4: $". $venta. "\n";

//• Se retorna el costo en productos que tiene hasta el momento la tienda.
$costoProductos = $objLocal->retornarCostoProductoLocal();
echo ">El costo es productos que la tienda tiene hasta ahora es de: $" . $costoProductos . "\n";