<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$resultado1 = llamadaAFuncion(2,2, fn($valor1, $valor2) => $valor1 * $valor2);
$resultado2 = llamadaAFuncion(2,2, fn($valor1, $valor2) => $valor1 - $valor2);
$resultado3 = llamadaAFuncion(2,2, fn($valor1, $valor2) => $valor1 + $valor2);
// Dibuja la vista
inicioCabecera("TITULO DEL EJERCICIO");
cabecera();
finCabecera();

inicioCuerpo("TITULO DE LA PAGINA");
cuerpo($resultado1, $resultado2, $resultado3);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($resultado1, $resultado2, $resultado3)
{
?>
    <p>Resultado de la operación de Multiplicación con función flecha: <?php echo $resultado1; ?></p>
    <p>Resultado de la operación de Resta con función flecha: <?php echo $resultado2; ?></p>
    <p>Resultado de la operación de Suma con función flecha: <?php echo $resultado3; ?></p>
<?php
}