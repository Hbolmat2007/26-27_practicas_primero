<?php

include_once(dirname(__FILE__) . "/generarImagen.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

// Identificar cliente
$ip = direccionIP();
$navegador = navegador();

// Localizar fichero
$nombreFichero = "puntos_" . $ip . "_" . $navegador . ".dat";
$rutaFichero = dirname(__FILE__) . "/../../ficherosP7/" . $nombreFichero;

// Cargar puntos
$Puntos = cargarPuntos($rutaFichero);

// Descargar imagen
header("Content-Type: image/jpeg");
header('Content-Disposition: attachment; filename="puntos.jpg"');

generarImagen($Puntos);

?>
