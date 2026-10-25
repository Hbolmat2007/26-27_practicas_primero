<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
$array = ["Alfarnate", "Periana", "Estación de Salinas", "Archidona", "Zafarraya", "Tapia"];
ordenar($array);
$arraySinOrdenar = ["Alfarnate", "Periana", "Estación de Salinas", "Archidona", "Zafarraya", "Tapia"];

// Dibuja la vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 7");
cuerpo($array, $arraySinOrdenar);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($array, $arraySinOrdenar)
{
?>
    <p>Array sin ordenar: <?php echo print_r($arraySinOrdenar); ?></p>
    <p>Array Ordenado: <?php echo print_r($array); ?></p>
<?php
}