
<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_normal.php");
include_once(dirname(__FILE__) . "/val_filter.php");

// Controlador

// Validar ENTERO
$entero1 = 50;
$resEntero1 = \VARNORMAL\validaEntero($entero1, 1, 100, 10);

$entero2 = 150;
$resEntero2 = \VARFILTER\validaEntero($entero2, 1, 100, 10);


// Validar REAL
$real1 = 5.5;
$resReal1 = \VARNORMAL\validaReal($real1, 0, 10, 2);

$real2 = 15.5;
$resReal2 = \VARFILTER\validaReal($real2, 0, 10, 2);


// Validar FECHA
$fecha1 = "1/2/2024";
$resFecha1 = \VARNORMAL\validaFecha($fecha1, "01/01/2000");

$fecha2 = "30/2/2024";
$resFecha2 = \VARFILTER\validaFecha($fecha2, "01/01/2000");


// Validar HORA
$hora1 = "1:2:3";
$resHora1 = \VARNORMAL\validaHora($hora1, "00:00:00");

$hora2 = "25:30:00";
$resHora2 = \VARFILTER\validaHora($hora2, "00:00:00");


// Validar EMAIL
$email1 = "usuario@gmail.com";
$resEmail1 = \VARNORMAL\validaEmail($email1, "error@email.com");

$email2 = "correoIncorrecto";
$resEmail2 = \VARFILTER\validaEmail($email2, "error@email.com");


// Validar CADENA
$cadena1 = "Hola mundo";
$resCadena1 = \VARNORMAL\validaCadena($cadena1, 20, "Defecto");

$cadena2 = "Esta cadena es demasiado larga";
$resCadena2 = \VARFILTER\validaCadena($cadena2, 10, "Defecto");


// Validar EXPRESION
$expresion1 = "ABC12";
$resExpresion1 = \VARNORMAL\validaExpresion($expresion1, "/^[A-Z]{3}[0-9]{2}$/", "Defecto");

$expresion2 = "abc12";
$resExpresion2 = \VARFILTER\validaExpresion($expresion2, "/^[A-Z]{3}[0-9]{2}$/", "Defecto");


// Validar RANGO (ELEMENTOS)
$array1 = ["rojo", "verde", "azul"];

$rango1 = "verde";
$resRango1 = \VARNORMAL\validaRango($rango1, $array1);

$rango2 = "amarillo";
$resRango2 = \VARFILTER\validaRango($rango2, $array1);


// Validar RANGO (CLAVES)
$array2 = ["nombre" => "Hugo", "edad" => 19, "pueblo" => "Salinas"];

$rango3 = "edad";
$resRango3 = \VARNORMAL\validaRango($rango3, $array2, 2);

$rango4 = "apellido";
$resRango4 = \VARFILTER\validaRango($rango4, $array2, 2);


// Dibuja la vista
inicioCabecera("EJERCICIO 1");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1");
cuerpo($entero1, $resEntero1, $entero2, $resEntero2,
       $real1, $resReal1, $real2, $resReal2,
       $fecha1, $resFecha1, $fecha2, $resFecha2,
       $hora1, $resHora1, $hora2, $resHora2,
       $email1, $resEmail1, $email2, $resEmail2,
       $cadena1, $resCadena1, $cadena2, $resCadena2,
       $expresion1, $resExpresion1, $expresion2, $resExpresion2,
       $rango1, $resRango1, $rango2, $resRango2,
       $rango3, $resRango3, $rango4, $resRango4);
finCuerpo();


// Vista
function cabecera()
{
}

function cuerpo($entero1, $resEntero1, $entero2, $resEntero2,
                $real1, $resReal1, $real2, $resReal2,
                $fecha1, $resFecha1, $fecha2, $resFecha2,
                $hora1, $resHora1, $hora2, $resHora2,
                $email1, $resEmail1, $email2, $resEmail2,
                $cadena1, $resCadena1, $cadena2, $resCadena2,
                $expresion1, $resExpresion1, $expresion2, $resExpresion2,
                $rango1, $resRango1, $rango2, $resRango2,
                $rango3, $resRango3, $rango4, $resRango4)
{
?>

    <h2>Validar entero - VARNORMAL</h2>
    <p>Valor: <?php echo $entero1; ?></p>
    <p>Resultado: <?php print_r($resEntero1); ?></p>

    <h2>Validar entero - VARFILTER</h2>
    <p>Valor: <?php echo $entero2; ?></p>
    <p>Resultado: <?php print_r($resEntero2); ?></p>


    <h2>Validar real - VARNORMAL</h2>
    <p>Valor: <?php echo $real1; ?></p>
    <p>Resultado: <?php print_r($resReal1); ?></p>

    <h2>Validar real - VARFILTER</h2>
    <p>Valor: <?php echo $real2; ?></p>
    <p>Resultado: <?php print_r($resReal2); ?></p>


    <h2>Validar fecha - VARNORMAL</h2>
    <p>Valor: <?php echo $fecha1; ?></p>
    <p>Resultado: <?php print_r($resFecha1); ?></p>

    <h2>Validar fecha - VARFILTER</h2>
    <p>Valor: <?php echo $fecha2; ?></p>
    <p>Resultado: <?php print_r($resFecha2); ?></p>


    <h2>Validar hora - VARNORMAL</h2>
    <p>Valor: <?php echo $hora1; ?></p>
    <p>Resultado: <?php print_r($resHora1); ?></p>

    <h2>Validar hora - VARFILTER</h2>
    <p>Valor: <?php echo $hora2; ?></p>
    <p>Resultado: <?php print_r($resHora2); ?></p>


    <h2>Validar email - VARNORMAL</h2>
    <p>Valor: <?php echo $email1; ?></p>
    <p>Resultado: <?php print_r($resEmail1); ?></p>

    <h2>Validar email - VARFILTER</h2>
    <p>Valor: <?php echo $email2; ?></p>
    <p>Resultado: <?php print_r($resEmail2); ?></p>


    <h2>Validar cadena - VARNORMAL</h2>
    <p>Valor: <?php echo $cadena1; ?></p>
    <p>Resultado: <?php print_r($resCadena1); ?></p>

    <h2>Validar cadena - VARFILTER</h2>
    <p>Valor: <?php echo $cadena2; ?></p>
    <p>Resultado: <?php print_r($resCadena2); ?></p>


    <h2>Validar expresión - VARNORMAL</h2>
    <p>Valor: <?php echo $expresion1; ?></p>
    <p>Resultado: <?php print_r($resExpresion1); ?></p>

    <h2>Validar expresión - VARFILTER</h2>
    <p>Valor: <?php echo $expresion2; ?></p>
    <p>Resultado: <?php print_r($resExpresion2); ?></p>


    <h2>Validar rango (elementos) - VARNORMAL</h2>
    <p>Valor: <?php echo $rango1; ?></p>
    <p>Resultado: <?php print_r($resRango1); ?></p>

    <h2>Validar rango (elementos) - VARFILTER</h2>
    <p>Valor: <?php echo $rango2; ?></p>
    <p>Resultado: <?php print_r($resRango2); ?></p>


    <h2>Validar rango (claves) - VARNORMAL</h2>
    <p>Valor: <?php echo $rango3; ?></p>
    <p>Resultado: <?php print_r($resRango3); ?></p>

    <h2>Validar rango (claves) - VARFILTER</h2>
    <p>Valor: <?php echo $rango4; ?></p>
    <p>Resultado: <?php print_r($resRango4); ?></p>

<?php
}
