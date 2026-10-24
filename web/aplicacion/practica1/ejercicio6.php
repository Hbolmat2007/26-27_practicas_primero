<?php

use function PHPSTORM_META\type;

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
</html>34
<?php
}



// your functions above...
inicioCabecera("Ejercicio 6");
finCabecera();

inicioCuerpo("Ejercicio 6");

$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

reset($vector);


while (key($vector) !== null) {
    $indice = key($vector);
    $valor = current($vector);
    echo "Índice: ", $indice, ", Valor: ", var_export($valor, true) . "<br>";
    next($vector);
}

echo "<br> <h3> Array_keys y Array_values </h3>";

$claves = array_keys($vector);
$valores = array_values($vector);

for ($i = 0; $i < count($vector); $i++) {
    echo "Índice: ", $claves[$i], ", Valor: ", var_export($valores[$i], true), "<br>";
}
finCuerpo();
