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
</html>34
<?php
}



// your functions above...
inicioCabecera("Ejercicio 3");
finCabecera();

inicioCuerpo("Ejercicio 3");


$array = [];
$array[1] = rand();
$array[16] = rand();
$array[54] = rand();
$array[] = 34;
$array["uno"] = "cadena";
$array["dos"] = true;
$array["tres"] = 1.345;
$array["última"] = ["1.34" => "nueva"];

$array2 = array(1 => rand(), 16 => rand(), 54 => rand(), 34, "uno" => "cadena", "dos" => true, "tres" => 1.345, "última" => ["1.34" => "nueva"]);
$array3 = [1 => rand(), 16 => rand(), 54 => rand(), 34, "uno" => "cadena", "dos" => true, "tres" => 1.345, "última" => ["1.34" => "nueva"]];

foreach($array as $clave => $valor) {
    
    echo "Clave: ", $clave, " Valor: ";
    if (is_array($valor)) {
        print_r($valor);
        echo "<br>";
    } else {
        echo $valor, "<br>";
    }
}

foreach($array2 as $clave => $valor) {
    
    echo "Clave: ", $clave, " Valor: ";
    if (is_array($valor)) {
        print_r($valor);
        echo "<br>";
    } else {
        echo $valor, "<br>";
    }
}
foreach($array3 as $clave => $valor) {
    
    echo "Clave: ", $clave, " Valor: ";
    if (is_array($valor)) {
        print_r($valor);
        echo "<br>";
    } else {
        echo $valor, "<br>";
    }
}
finCuerpo();