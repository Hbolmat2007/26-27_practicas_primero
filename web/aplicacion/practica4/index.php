<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$barra = [

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
