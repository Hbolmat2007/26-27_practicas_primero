<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Primera práctica");
cabecera();
finCabecera();
inicioCuerpo("Práctica 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
?>
    <br>
    <button class="boton"><a href="./practica1/ejercicio1.php">Ejercicio1</a></button>
    <?php
    ?>
<?php
}
