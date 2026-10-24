<?php

function paginaError($mensaje)
{
  header("HTTP/1.0 404 $mensaje");
  inicioCabecera("PRACTICA");
  finCabecera();
  inicioCuerpo("ERROR");
  echo "<br />\n";
  echo $mensaje;
  echo "<br />\n";
  echo "<br />\n";  echo "<br />\n";
  echo "<a href='/index.php'>Ir a la pagina principal</a>\n";
  
  finCuerpo();  
}

function inicioCabecera($titulo)
{
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
            <meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1">

        <title><?php echo $titulo ?></title>
        <meta name="description" content="">
        <meta name="author" content="Administrador">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        
        <link rel="stylesheet" type="text/css" href="/estilos/base.css">
<?php
}

function finCabecera()
{
?>
    </head>
<?php   
}

function inicioCuerpo($cabecera)
{
    global $acceso;

?>
    <body>
        <div id="documento">
        
            <header>
                <h1 id="titulo"><?php echo $cabecera;?></h1>
            </header>
            
            <div id="barraLogin">
                
            </div>
            <div id="barraMenu">
                    <button class="boton"><a href="/index.php">Inicio</a></button>
            </div>
            
            <div>
<?php   
}

function finCuerpo()
{
?>
                <br />
                <br />
            </div>
            <footer>
                <hr width="90%"  />  
                <div>
                    &copy; Copyright by Ayuntamiento de Zúñiga
                </div>
            </footer>
        </div>
    </body>
</html>
<?php
}



// your functions above...
define ("Max_lanzamientos", 1000);
inicioCabecera("Ejercicio 2");
finCabecera();

inicioCuerpo("Ejercicio 2");

echo "<h1>Lanzamiento de un dado: </h1>";
for ($a = 1; $a <=6; $a++) {
    echo "Lanzamiento ", $a, " del dado: ", mt_rand(1,6), "<br>";
}
$cont = 0;
$numeros = [];

while ($cont < Max_lanzamientos) {
    $cont++;
    $numeros[] = (mt_rand() % 6) + 1;
}
echo "<br><br>";
$repeticiones = array_count_values($numeros);
for ($a = 1; $a <=6; $a++) {
    echo "El número", $a, " ha salido ", $repeticiones[$a], " con un porcentaje de ", (($repeticiones[$a] / Max_lanzamientos) * 100), "%", "<br>";
}
finCuerpo();
