<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Se incluye 
include_once(dirname(__FILE__) . "/../../scripts/clases/flauta.php");



// Controlador
$arr = ["material" => "Oro"];
$fl1 = flauta::crearDesdeArray($arr);
$fl2 = clone($fl1);

// Dibuja la vista
inicioCabecera("Ejercicio flautas");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 4");
cuerpo($fl1, $fl2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($fl1, $fl2)
{
?>
    <p>Prueba de flauta</p>
    <p>Flauta 1: <?php echo $fl1; ?></p>
    <p>Flauta 2: <?php echo $fl2; ?></p>
<?php
}