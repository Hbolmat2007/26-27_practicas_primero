<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/funciones.php");

// Controlador
// 1. Recoger los datos necesarios.
// 2. Validarlos y procesarlos.
// 3. Preparar los datos para la vista.

// Dibuja la vista
inicioCabecera("TITULO DEL EJERCICIO");
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