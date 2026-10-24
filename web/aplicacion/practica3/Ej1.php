<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");
// Controlador

// Dibuja la vista
inicioCabecera("Ejercicio 1");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1");

$num = 25;
$array = array();
$contador = 0;
$cadena = "primera";
if (cuentaVeces($array, $cadena, $num, $contador)) {
    cuerpo($array, $contador, $cadena);
}
$cadena = "1era";
if (cuentaVeces($array, $cadena, $num, $contador)) {
    cuerpo($array, $contador, $cadena);
}
$cadena = "2nda";
if (cuentaVeces($array, $cadena, $num, $contador)) {
    cuerpo($array, $contador, $cadena);
}

finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo(array $array, int $contador, string $cadena)
{
?>
    
<?php
    echo "<p>Elemento de la posición $cadena: " . $array[$cadena] . ". Contador: $contador</p>";
}