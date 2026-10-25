<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$valor1 = 5;
$valor1original = $valor1;
$resultado = devuelve($valor1, 15);
// Dibuja la vista
inicioCabecera("TITULO DEL EJERCICIO");
cabecera();
finCabecera();

inicioCuerpo("TITULO DE LA PAGINA");
cuerpo($valor1, $valor1original, $resultado);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($valor1, $valor1original, $resultado)
{
?>
    
<?php
    echo "<p>Resultados de la función \"devuelve()\", para el valor " . $valor1original . ":</p>";
    echo "<p>Valor del primer valor: " . $valor1 . ". Resultado: " . $resultado."</p>";
    echo "<p>(Valores por defecto: 10 y 20. Valor del segundo operando: 15)</p>";
}