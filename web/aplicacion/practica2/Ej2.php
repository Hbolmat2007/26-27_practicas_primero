<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Controlador
$cadena = "Está la niña en casa";
$resultado = "";
for ($i = 0; $i <= (mb_strlen($cadena) + 1); $i++) {
    $resultado =  $resultado . str_repeat(" ", $i) . mb_substr($cadena, $i, 1) . "<br>";
}


$j = 0;
$resultado2 = "";
for ($i = -1; $i >= (-1 * mb_strlen($cadena)); $i--) {

    $resultado2 =  $resultado2 . str_repeat(" ", $j);
    $j++;
    if (($i % 2) == 0) {
        $resultado2 = $resultado2 . mb_strtoupper(mb_substr($cadena, $i, 1)); 
    } else {
        $resultado2 = $resultado2 . mb_strtolower(mb_substr($cadena, $i, 1)); 
    }
    $resultado2 = $resultado2 . "<br>";
    
}

$arrayCadenas = mb_split("a", $cadena);
$resultado3 = "";
for ($i = 0; $i < count($arrayCadenas); $i++) {
    $resultado3 = $resultado3 . $arrayCadenas[$i] . "<br>";
}
$resultado4 = str_replace("niña ", "niña/mujer", $cadena);


inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 2");
cuerpo($resultado, $resultado2, $resultado3, $resultado4);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo($resultado, $resultado2, $resultado3, $resultado4)
{
    echo "<pre>$resultado </pre>";
    echo "<strong><p>Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena)
    con cada carácter en una línea distinta y con los espacios en blanco
    correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en
    mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los
    caracteres con mb_substr.</p></strong>";
    echo "<pre> $resultado2 </pre>";
    echo "<strong><p>Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea
    distinta</p></strong>";
    echo "<pre> $resultado3 </pre>";
    echo "Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el espacio en blanco) por \"/mujer \"";
    echo "<pre> $resultado4 </pre>";
?>
    
<?php
}