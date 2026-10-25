<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$valor1 = 5;
$valor2 = 6;
$mult = hacerOperacion("multiplicar",$valor1,$valor2);
$suma = hacerOperacion("sumar",$valor1,$valor2);
$resta = hacerOperacion("restar",$valor1,$valor2);

// Dibuja la vista
inicioCabecera("Ejercicio 5");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 5");
cuerpo($mult, $resta, $suma);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($mult, $resta, $suma)
{
?>
    <p>Resultado de la operación de Multiplicación: <?php echo $mult; ?></p>
    <p>Resultado de la operación de Resta: <?php echo $resta; ?></p>
    <p>Resultado de la operación de Suma: <?php echo $suma; ?></p>
<?php
}