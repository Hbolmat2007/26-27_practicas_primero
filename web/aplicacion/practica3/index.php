<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$barra = [
    ["TEXTO" => "Ejercicio 1", "ENLACE" => "./Ej1.php"],
    ["TEXTO" => "Ejercicio 2", "ENLACE" => "./Ej2.php"],
    ["TEXTO" => "Ejercicio 3", "ENLACE" => "./Ej3.php"],
    ["TEXTO" => "Ejercicio 4", "ENLACE" => "./Ej4.php"],
    ["TEXTO" => "Ejercicio 5", "ENLACE" => "./Ej5.php"],
    ["TEXTO" => "Ejercicio 6", "ENLACE" => "./Ej6.php"],
    ["TEXTO" => "Ejercicio 7", "ENLACE" => "./Ej7.php"]

];

// Dibuja la vista
inicioCabecera("Práctica 3");
cabecera();
finCabecera();

inicioCuerpo("Práctica 3");
cuerpo($barra);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($barra)
{
    mostrarBarra($barra);
?>

<?php
}