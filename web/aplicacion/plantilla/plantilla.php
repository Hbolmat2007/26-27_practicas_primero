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
        <meta charset="UTF-8">

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
        
        <link rel="stylesheet" type="text/css" href="../../estilos/base.css">
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
        
            <header id="cabecera">
                <a href="../../index.php"><img id="logo" src="../../imagenes/logo.png" alt=""></a> 
                <h1 id="titulo"><?php echo $cabecera;?></h1>
            </header>
            
            <div id="barraLogin">
                
            </div>
            <div id="barraMenu">
            </div>

            <div>
            <?php mostrarUbicacion();?>
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
                    &copy; Copyright  by Asociación de Vecinos de Estación de Salinas
                </div>
            </footer>
        </div>
    </body>
</html>
<?php
}

function mostrarBarra($barra)
{
    foreach ($barra as $item) {
        $enlace = isset($item["ENLACE"]) ? "href='" . $item["ENLACE"] . "'" : "";
        $texto = $item["TEXTO"] ?? "";
        $adicional = $item["ADICIONAL"] ?? "";

        echo !empty($enlace) ? "<a class='boton' {$enlace}>{$texto} {$adicional}</a>" :
            "<p>{$texto} {$adicional}</p>";
    }
}

function mostrarUbicacion()
{
    $script  = $_SERVER["SCRIPT_NAME"];
    $carpeta = trim(dirname($script), "/\\.");
    $fichero = basename($script, ".php");

    echo "<nav id='barraUbicacion'>";
    echo "Estás en: <a href='/index.php'>Inicio</a>";

    if ($carpeta !== "") {
        echo " &rsaquo; <a href='/$carpeta/index.php'>" . ucfirst($carpeta) . "</a>";
    }

    if ($fichero !== "index") {
        echo " &rsaquo; <span class='actual'>$fichero</span>";
    }

    echo "</nav>\n";
}