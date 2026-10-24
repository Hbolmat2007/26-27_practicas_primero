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

inicioCuerpo("TITULO DE LA PAGINA");
cuerpo(/* pasar aquí los datos necesarios */);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo(/* parámetros necesarios */)
{
?>
    <!-- HTML del ejercicio -->
<?php
}