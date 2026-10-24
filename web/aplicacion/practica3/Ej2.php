<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$cadena0 = generarCadena(0);
$cadena10 = generarCadena();
$cadena50 = generarCadena(50);

// Dibuja la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 2");
cuerpo($cadena0, $cadena10, $cadena50);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($cadena0, $cadena10, $cadena50)
{
?>

<?php
    echo "<p>Cadena de 0 carácteres: $cadena0</p>";
    echo "<br>";
    echo "<p>Cadena de 10 carácteres: $cadena10</p>";
    echo "<br>";
    echo "<p>Cadena de 50 carácteres: " . $cadena50 . "</p>";
}