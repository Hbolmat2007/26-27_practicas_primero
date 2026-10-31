<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Se incluye 
include_once(dirname(__FILE__) . "/../../scripts/clases/instrumentoPrueba.php");



// Controlador
$instrumento1 = new instrumentoPrueba("Guitarra Fender", 5);
$instrumento2 = new instrumentoPrueba("Teclado Casio");

$str1 = $instrumento1->__toString();
$str2 = $instrumento2->__toString();

// Dibuja la vista
inicioCabecera("Ejercicio instrumentos");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1");
cuerpo($str1, $str2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($str1, $str2)
{
?>
    <p>He creado otra clase, "InstrumentoPrueba.php", que no es abstracta, para las pruebas</p>
    <p>Instrumento 1: <?php echo $str1; ?></p>
    <p>Instrumento 2: <?php echo $str2; ?></p>
<?php
}