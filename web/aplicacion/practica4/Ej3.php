<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Se incluye 
include_once(dirname(__FILE__) . "/../../scripts/clases/InstrumentoViento.php");



// Controlador
$instrumento1 = new InstrumentoViento("Madera", 5);
$instrumento2 = new instrumentoViento("Teclado Casio");


// Dibuja la vista
inicioCabecera("Ejercicio instrumentos");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 3");
cuerpo($instrumento1, $instrumento2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($instrumento1, $instrumento2)
{
?>
    <p>Prueba del instrumento de viento</p>
    <p>Instrumento 1: <?php echo $instrumento1; ?></p>
    <p>Instrumento 2: <?php echo $instrumento2; ?></p>
<?php
}