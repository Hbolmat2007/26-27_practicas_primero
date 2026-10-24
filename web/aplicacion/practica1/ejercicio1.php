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

inicioCabecera("Ejercicio 1");
finCabecera();

inicioCuerpo("Ejercicio 1");

$variable1 = 0.5;
$variable2 = 0.4;
$variable3 = -5;
$variable4 = 20;
$variable5 = 3;

echo "Valor absoluto de ", $variable3, ": ", abs($variable3);
echo "<br>";
echo "Redondeo de ", $variable2, ": ", round($variable2);
echo "<br>";
echo "Redondeo de ", $variable1, ": ", round($variable1);
echo "<br>";
echo $variable4, " elevado a ", $variable5, ": ", pow($variable4, $variable5);
echo "<br>";
echo "Raíz cuadrada de ", $variable4, ": ", sqrt($variable4);
echo "<br>";
echo "Hexadecimal de 50589: ", dechex(50589);
echo "<br>";
echo "123123 (base 4) a base 8: ", base_convert(123123, 4, 8);
echo "<br>";
echo "Redondeo de ", $variable1, " hacia abajo: ", floor($variable1);
echo "<br>";
echo "Redondeo de ", $variable2, " hacia arriba: ", ceil($variable2);
finCuerpo();
