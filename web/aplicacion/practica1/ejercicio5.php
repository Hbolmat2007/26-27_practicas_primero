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
inicioCabecera("Ejercicio 5");
finCabecera();

inicioCuerpo("Ejercicio 5");
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;

foreach($vector as $clave => $valor) {
    echo "Posicion ", $clave, ", contenido (tipo): ", gettype($valor), "<br>";
    if (gettype($valor) === "array") {
        foreach ($valor as $valorarray) {
            echo $valorarray, ", ";
        }
    } else if (gettype($valor) === "integer") {
        echo "Entero con valor ", $valor, ", en binario ", decbin($valor);
    } else if (gettype($valor) === "double") {
        echo $valor, ", que al cuadrado es ", pow($valor, 2);
    } else if (gettype($valor) === "boolean") {
        if ($valor) {
            echo "true, y su opuesto es false";
        } else {
            echo "false, y su opuesto es true";
        }
    } else if (gettype($valor) === "string") {
        echo "-", $valor, "-";
    }
    echo "<br>";
}

finCuerpo();
