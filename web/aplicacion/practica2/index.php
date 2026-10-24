<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$barra = [
    ["TEXTO" => "Ejercicio 1", "ENLACE" => "./Ej1.php"],
    ["TEXTO" => "Ejercicio 2", "ENLACE" => "./Ej2.php"],
    ["TEXTO" => "Ejercicio 3", "ENLACE" => "./Ej3.php"],
    ["TEXTO" => "Ejercicio 4", "ENLACE" => "./Ej4.php"],
    ["TEXTO" => "Ejercicio 5", "ENLACE" => "./Ej5.php"]

];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($barra);  
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($barra)
{
    
    mostrarBarra($barra);

?>
<?php
}
