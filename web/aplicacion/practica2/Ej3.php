<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// Controlador
$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$cadena = "";
$cadena2 = "";

for ($i = 0; $i < 20; $i++) {
    $posicion = rand(0, strlen($caracteres) - 1);
    $cadena = $cadena . $caracteres[$posicion];
}

for ($i = 0; $i < 20; $i++) {
    $codigo = rand(48, 122);

    while (!(($codigo >= 48 && $codigo <= 57) ||
             ($codigo >= 65 && $codigo <= 90) ||
             ($codigo >= 97 && $codigo <= 122))) {
        $codigo = rand(48, 122);
    }
    $cadena2 = $cadena2 . chr($codigo);
}

inicioCabecera("Ejercicio 3");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 3");
cuerpo($cadena, $cadena2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($cadena, $cadena2)
{
    echo "<strong><p>Genera una cadena aleatoria a partir de un array con todos los caracteres válidos.</p></strong>";
    echo "<p>$cadena</p>";
    echo "<strong><p>Genera una cadena aleatoria a partir del código ASCII.</p></strong>";
    echo "<p>$cadena2</p>";
?>
<?php
}