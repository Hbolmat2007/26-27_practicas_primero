<?php
include_once(dirname(__FILE__) . "/../plantilla/plantilla.php");

// Controlador

$variable = 57;
$variable2  = 850;
$Texto1 = "Salinas es una \"Pedanía\" de Archidona, que está a $variable kilómetros de 'Málaga' <br> y a $variable2 kilómetos de Zúñiga";
$Texto2 = 'Salinas es una "Pedanía" de Archidona, que está a $variable kilómetros de \'Málaga\' <br> y a $variable2 kilómetos de Zúñiga';

$Texto3 = <<<ID
Salinas es una "Pedanía" de Archidona, 
que está a $variable kilómetros de 'Málaga' <br>
y a $variable2 kilómetos de Zúñiga
ID;

$Texto4 = <<<'ID'
Salinas es una "Pedanía" de Archidona, 
que está a $variable kilómetros de 'Málaga' <br>
y a $variable2 kilómetos de Zúñiga
ID;

// Dibuja la vista
inicioCabecera("EJERCICIO 1");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1");
cuerpo($Texto1, $Texto2, $Texto3, $Texto4);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($Texto1, $Texto2, $Texto3, $Texto4)
{
    echo "<p> $Texto1 </p>";
    echo "<br>";
    echo "<p> $Texto2 </p>";
    echo "<br>";
    echo "<p> $Texto3 </p>";
    echo "<br>";
    echo "<p> $Texto4 </p>";
    echo "<br>";
    
?>
    
<?php
}