<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$numero1 = 17.5;
$numero2 = 379987.24;

$resultado1 = str_pad(number_format($numero1, 1, ",", "."), 15, "0", STR_PAD_LEFT);
$resultado2 = str_pad(number_format($numero2, 2, ",", "."), 15, " ", STR_PAD_LEFT);

inicioCabecera("Ejercicio 4");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 4");
cuerpo($resultado1, $resultado2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($resultado1, $resultado2)
{
    echo "<p>Primer valor: -" . $resultado1 . "-</p><br>"; 
    echo "<p>Segundo valor: -" . $resultado2. "-</p>";
}