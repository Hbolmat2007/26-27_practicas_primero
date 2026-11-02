<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Se incluye 
include_once(dirname(__FILE__) . "/../../scripts/clases/SerieFibonacci.php");



// Controlador
$str1 = "";
foreach (new SerieFibonacci(20) as $valor) {
    $str1 = $str1 . $valor . " ";
}
$str2 = "";
foreach (SerieFibonacci::fFibonacci(50) as $valor) {
    $str2 = $str2 . $valor . " ";
}

// Dibuja la vista
inicioCabecera("Ejercicio Fibonacci");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 6");
cuerpo($str1, $str2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo(string $str1, string $str2)
{
?>
    <p>Prueba de Fibonacci:</p>
    <p>Iterando con foreach (new SerieFibonacci(20) as $valor): <br> <?php echo $str1; ?></p>
    <p>Función fFibonacci(50): <br><?php echo $str2; ?></p>
<?php
}