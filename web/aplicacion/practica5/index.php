<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$barra = [
    ["TEXTO" => "Ejercicio 1", "ENLACE" => "./Ej1.php"],
    ["TEXTO" => "Ejercicio 2", "ENLACE" => "./Ej2.php"]
];

//dibuja la plantilla de la vista
inicioCabecera("Aplicación de Hugo Bolaños");
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
