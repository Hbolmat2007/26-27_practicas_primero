<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$barra = [
    ["TEXTO" => "Ejercicio 1", "ENLACE" => "./Ej1.php"],
    ["TEXTO" => "Ejercicio 3", "ENLACE" => "./Ej3.php"],
    ["TEXTO" => "Ejercicio 4", "ENLACE" => "./Ej4.php"],
    ["TEXTO" => "Ejercicio 5", "ENLACE" => "./Ej5.php"]
    
];

//dibuja la plantilla de la vista
inicioCabecera("Práctica 4");
cabecera();
finCabecera();
inicioCuerpo("Clases, objetos y enumeraciones");
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
