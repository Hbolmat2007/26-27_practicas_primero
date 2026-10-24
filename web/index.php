<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$barra = [
    ["TEXTO" => "Practica 2", "ENLACE" => "./aplicacion/practica2/index.php"],
    ["TEXTO" => "Practica 3", "ENLACE" => "./aplicacion/practica3/index.php"],
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
