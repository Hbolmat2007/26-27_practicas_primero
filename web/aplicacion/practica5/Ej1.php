<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_normal.php");
include_once(dirname(__FILE__) . "/val_filter.php");

// Controlador
// (Los parámetros ahora se guardan en variables para poder mostrarlos en la vista)

// Validar ENTERO
$entero1 = 50;
$pEntero1 = ["min" => 1, "max" => 100, "defecto" => 10];
$resEntero1 = \VARNORMAL\validaEntero($entero1, $pEntero1["min"], $pEntero1["max"], $pEntero1["defecto"]);

$entero2 = 150;
$pEntero2 = ["min" => 1, "max" => 100, "defecto" => 10];
$resEntero2 = \VARFILTER\validaEntero($entero2, $pEntero2["min"], $pEntero2["max"], $pEntero2["defecto"]);


// Validar REAL
$real1 = 5.5;
$pReal1 = ["min" => 0, "max" => 10, "defecto" => 2];
$resReal1 = \VARNORMAL\validaReal($real1, $pReal1["min"], $pReal1["max"], $pReal1["defecto"]);

$real2 = 15.5;
$pReal2 = ["min" => 0, "max" => 10, "defecto" => 2];
$resReal2 = \VARFILTER\validaReal($real2, $pReal2["min"], $pReal2["max"], $pReal2["defecto"]);


// Validar FECHA
$fecha1 = "1/2/2024";
$pFecha1 = ["defecto" => "01/01/2000"];
$resFecha1 = \VARNORMAL\validaFecha($fecha1, $pFecha1["defecto"]);

$fecha2 = "30/2/2024";
$pFecha2 = ["defecto" => "01/01/2000"];
$resFecha2 = \VARFILTER\validaFecha($fecha2, $pFecha2["defecto"]);


// Validar HORA
$hora1 = "1:2:3";
$pHora1 = ["defecto" => "00:00:00"];
$resHora1 = \VARNORMAL\validaHora($hora1, $pHora1["defecto"]);

$hora2 = "25:30:00";
$pHora2 = ["defecto" => "00:00:00"];
$resHora2 = \VARFILTER\validaHora($hora2, $pHora2["defecto"]);


// Validar EMAIL
$email1 = "usuario@gmail.com";
$pEmail1 = ["defecto" => "error@email.com"];
$resEmail1 = \VARNORMAL\validaEmail($email1, $pEmail1["defecto"]);

$email2 = "correoIncorrecto";
$pEmail2 = ["defecto" => "error@email.com"];
$resEmail2 = \VARFILTER\validaEmail($email2, $pEmail2["defecto"]);


// Validar CADENA
$cadena1 = "Hola mundo";
$pCadena1 = ["longitud máx" => 20, "defecto" => "Defecto"];
$resCadena1 = \VARNORMAL\validaCadena($cadena1, $pCadena1["longitud máx"], $pCadena1["defecto"]);

$cadena2 = "Esta cadena es demasiado larga";
$pCadena2 = ["longitud máx" => 10, "defecto" => "Defecto"];
$resCadena2 = \VARFILTER\validaCadena($cadena2, $pCadena2["longitud máx"], $pCadena2["defecto"]);


// Validar EXPRESION
$expresion1 = "ABC12";
$pExpresion1 = ["patrón" => "/^[A-Z]{3}[0-9]{2}$/", "defecto" => "Defecto"];
$resExpresion1 = \VARNORMAL\validaExpresion($expresion1, $pExpresion1["patrón"], $pExpresion1["defecto"]);

$expresion2 = "abc12";
$pExpresion2 = ["patrón" => "/^[A-Z]{3}[0-9]{2}$/", "defecto" => "Defecto"];
$resExpresion2 = \VARFILTER\validaExpresion($expresion2, $pExpresion2["patrón"], $pExpresion2["defecto"]);


// Validar RANGO (ELEMENTOS)
$array1 = ["rojo", "verde", "azul"];

$rango1 = "verde";
$pRango1 = ["array" => $array1];
$resRango1 = \VARNORMAL\validaRango($rango1, $array1);

$rango2 = "amarillo";
$pRango2 = ["array" => $array1];
$resRango2 = \VARFILTER\validaRango($rango2, $array1);


// Validar RANGO (CLAVES)
$array2 = ["nombre" => "Hugo", "edad" => 19, "pueblo" => "Salinas"];

$rango3 = "edad";
$pRango3 = ["array" => $array2, "modo" => 2];
$resRango3 = \VARNORMAL\validaRango($rango3, $array2, $pRango3["modo"]);

$rango4 = "apellido";
$pRango4 = ["array" => $array2, "modo" => 2];
$resRango4 = \VARFILTER\validaRango($rango4, $array2, $pRango4["modo"]);


// Dibuja la vista
inicioCabecera("EJERCICIO 1");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 1");
cuerpo($entero1, $resEntero1, $pEntero1, $entero2, $resEntero2, $pEntero2,
       $real1, $resReal1, $pReal1, $real2, $resReal2, $pReal2,
       $fecha1, $resFecha1, $pFecha1, $fecha2, $resFecha2, $pFecha2,
       $hora1, $resHora1, $pHora1, $hora2, $resHora2, $pHora2,
       $email1, $resEmail1, $pEmail1, $email2, $resEmail2, $pEmail2,
       $cadena1, $resCadena1, $pCadena1, $cadena2, $resCadena2, $pCadena2,
       $expresion1, $resExpresion1, $pExpresion1, $expresion2, $resExpresion2, $pExpresion2,
       $rango1, $resRango1, $pRango1, $rango2, $resRango2, $pRango2,
       $rango3, $resRango3, $pRango3, $rango4, $resRango4, $pRango4);
finCuerpo();


// Vista
function cabecera()
{
}

function cuerpo($entero1, $resEntero1, $pEntero1, $entero2, $resEntero2, $pEntero2,
                $real1, $resReal1, $pReal1, $real2, $resReal2, $pReal2,
                $fecha1, $resFecha1, $pFecha1, $fecha2, $resFecha2, $pFecha2,
                $hora1, $resHora1, $pHora1, $hora2, $resHora2, $pHora2,
                $email1, $resEmail1, $pEmail1, $email2, $resEmail2, $pEmail2,
                $cadena1, $resCadena1, $pCadena1, $cadena2, $resCadena2, $pCadena2,
                $expresion1, $resExpresion1, $pExpresion1, $expresion2, $resExpresion2, $pExpresion2,
                $rango1, $resRango1, $pRango1, $rango2, $resRango2, $pRango2,
                $rango3, $resRango3, $pRango3, $rango4, $resRango4, $pRango4)
{
?>

    <h2>Entero</h2>

    <h3>Validar entero - VARNORMAL</h3>
    <p>Valor: <?php echo $entero1; ?></p>
    <p>Parámetro min: <?php echo $pEntero1["min"]; ?></p>
    <p>Parámetro max: <?php echo $pEntero1["max"]; ?></p>
    <p>Por defecto: <?php echo $pEntero1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resEntero1); ?></p>

    <h3>Validar entero - VARFILTER</h3>
    <p>Valor: <?php echo $entero2; ?></p>
    <p>Parámetro min: <?php echo $pEntero2["min"]; ?></p>
    <p>Parámetro max: <?php echo $pEntero2["max"]; ?></p>
    <p>Por defecto: <?php echo $pEntero2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resEntero2); ?></p>

    <h2>Real</h2>

    <h3>Validar real - VARNORMAL</h3>
    <p>Valor: <?php echo $real1; ?></p>
    <p>Parámetro min: <?php echo $pReal1["min"]; ?></p>
    <p>Parámetro max: <?php echo $pReal1["max"]; ?></p>
    <p>Por defecto: <?php echo $pReal1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resReal1); ?></p>

    <h3>Validar real - VARFILTER</h3>
    <p>Valor: <?php echo $real2; ?></p>
    <p>Parámetro min: <?php echo $pReal2["min"]; ?></p>
    <p>Parámetro max: <?php echo $pReal2["max"]; ?></p>
    <p>Por defecto: <?php echo $pReal2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resReal2); ?></p>


    <h2>Fecha</h2>

    <h3>Validar fecha - VARNORMAL</h3>
    <p>Valor: <?php echo $fecha1; ?></p>
    <p>Por defecto: <?php echo $pFecha1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resFecha1); ?></p>
    
    <h3>Validar fecha - VARFILTER</h3>
    <p>Valor: <?php echo $fecha2; ?></p>
    <p>Por defecto: <?php echo $pFecha2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resFecha2); ?></p>

    <h2>Hora</h2>

    <h3>Validar hora - VARNORMAL</h3>
    <p>Valor: <?php echo $hora1; ?></p>
    <p>Por defecto: <?php echo $pHora1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resHora1); ?></p>

    <h3>Validar hora - VARFILTER</h3>
    <p>Valor: <?php echo $hora2; ?></p>
    <p>Por defecto: <?php echo $pHora2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resHora2); ?></p>

    <h2>Email</h2>

    <h3>Validar email - VARNORMAL</h3>
    <p>Valor: <?php echo $email1; ?></p>
    <p>Por defecto: <?php echo $pEmail1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resEmail1); ?></p>

    <h3>Validar email - VARFILTER</h3>
    <p>Valor: <?php echo $email2; ?></p>
    <p>Por defecto: <?php echo $pEmail2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resEmail2); ?></p>


    <h2>Cadena</h2>

    <h3>Validar cadena - VARNORMAL</h3>
    <p>Valor: <?php echo $cadena1; ?></p>
    <p>Parámetro longitud máx: <?php echo $pCadena1["longitud máx"]; ?></p>
    <p>Por defecto: <?php echo $pCadena1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resCadena1); ?></p>

    <h3>Validar cadena - VARFILTER</h3>
    <p>Valor: <?php echo $cadena2; ?></p>
    <p>Parámetro longitud máx: <?php echo $pCadena2["longitud máx"]; ?></p>
    <p>Por defecto: <?php echo $pCadena2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resCadena2); ?></p>

    <h2>Expresión</h2>

    <h3>Validar expresión - VARNORMAL</h3>
    <p>Valor: <?php echo $expresion1; ?></p>
    <p>Patrón: <?php echo $pExpresion1["patrón"]; ?></p>
    <p>Por defecto: <?php echo $pExpresion1["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resExpresion1); ?></p>

    <h3>Validar expresión - VARFILTER</h3>
    <p>Valor: <?php echo $expresion2; ?></p>
    <p>Parámetro patrón: <?php echo $pExpresion2["patrón"]; ?></p>
    <p>Por defecto: <?php echo $pExpresion2["defecto"]; ?></p>
    <p>Resultado: <?php var_dump($resExpresion2); ?></p>


    <h2>Rango (elementos)</h2>

    <h3>Validar rango (elementos) - VARNORMAL</h3>
    <p>Valor: <?php echo $rango1; ?></p>
    <p>Parámetro array: <?php var_dump($pRango1["array"]); ?></p>
    <p>Resultado: <?php var_dump($resRango1); ?></p>

    <h3>Validar rango (elementos) - VARFILTER</h3>
    <p>Valor: <?php echo $rango2; ?></p>
    <p>Array: <?php var_dump($pRango2["array"]); ?></p>
    <p>Resultado: <?php var_dump($resRango2); ?></p>


    <h2>Rango (claves)</h2>

    <h3>Validar rango (claves) - VARNORMAL</h3>
    <p>Valor: <?php echo $rango3; ?></p>
    <p>Array: <?php var_dump($pRango3["array"]); ?></p>
    <p>Tipo de operación: <?php echo $pRango3["modo"]; ?></p>
    <p>Resultado: <?php var_dump($resRango3); ?></p>

    <h3>Validar rango (claves) - VARFILTER</h3>
    <p>Valor: <?php echo $rango4; ?></p>
    <p>Array: <?php var_dump($pRango4["array"]); ?></p>
    <p>Tipo de operacion: <?php echo $pRango4["modo"]; ?></p>
    <p>Resultado: <?php var_dump($resRango4); ?></p>

<?php
}