<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$array_numeros = Array();
$array_numeros[0] = 7;
$array_numeros[1] = 23;
$array_numeros[2] = 1;
$array_numeros[3] = 124;
$resOperacion1 = operaciones(1, $array_numeros[0], $array_numeros[1], $array_numeros[2], $array_numeros[3]);
$resOperacion2 = operaciones(2, $array_numeros[0], $array_numeros[1], $array_numeros[2], $array_numeros[3]);
$resOperacion3 = operaciones(3, $array_numeros[0], $array_numeros[1], $array_numeros[2], $array_numeros[3]);
$resOperacion4 = operaciones(4, $array_numeros[0], $array_numeros[1], $array_numeros[2], $array_numeros[3]);

// Dibuja la vista
inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 3");
cuerpo($array_numeros, $resOperacion1, $resOperacion2, $resOperacion3, $resOperacion4);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($array_numeros, $resOperacion1, $resOperacion2, $resOperacion3, $resOperacion4)
{
?>
    
<?php
    echo "<p>Números: " . $array_numeros[0] . ", " . $array_numeros[1] . ", " . $array_numeros[2] . ", " . $array_numeros[3] . "</p>";
    echo "<br>";
    echo "<p>Resultado operación 1: " . $resOperacion1 . "</p>";
    echo "<br>";
    echo "<p>Resultado operación 2: " . $resOperacion2 . "</p>";
    echo "<br>";
    echo "<p>Resultado operación 3: " . $resOperacion3 . "</p>";
    echo "<br>";
    echo "<p>Resultado operación 4: " . $resOperacion4 . "</p>";
    
}