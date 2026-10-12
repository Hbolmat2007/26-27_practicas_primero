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
    <button class="boton"><a href="./practica1/ejercicio1.php">Ejercicio 1</a></button>
    <button class="boton"><a href="./practica1/ejercicio2.php">Ejercicio 2</a></button>
    <button class="boton"><a href="./practica1/ejercicio3.php">Ejercicio 3</a></button>
    <button class="boton"><a href="./practica1/ejercicio4.php">Ejercicio 4</a></button>
    <button class="boton"><a href="./practica1/ejercicio5.php">Ejercicio 5</a></button>
    <button class="boton"><a href="./practica1/ejercicio6.php">Ejercicio 6</a></button>
    <button class="boton"><a href="./practica1/ejercicio7.php">Ejercicio 7</a></button>
    <?php
    ?>
<?php
}
