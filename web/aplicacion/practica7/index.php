
<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");
include_once(dirname(__FILE__) . "/../../scripts/Puntos.php");
include_once(dirname(__FILE__) . "/generarImagen.php");
include_once(dirname(__FILE__) . "/../practica5/val_normal.php");
use function VARNORMAL\validaEntero;
use function VARNORMAL\validaRango;


// Controlador
$errores = [
    "errorY" => false,
    "errorX" => false,
    "errorColor" => false,
    "errorGrosor" => false,
    "errorGeneral" => false
];

$valores = [
    "coordX" => "",
    "coordY" => "",
    "colores" => "",
    "grosor" => ""
]; 

$ip = direccionIP();
$navegador = navegador();

$nombreFichero = "puntos_" . $ip . "_" . $navegador . ".dat";
$rutaFichero = dirname(__FILE__) . "/../../ficherosP7/" . $nombreFichero;
$Puntos = cargarPuntos($rutaFichero);


$nombreImagen = "imagen_" . $ip . "_" . $navegador . ".jpg";
$rutaImagen = dirname(__FILE__) . "/../../imagenes/puntos/" . $nombreImagen;
$urlImagen =  "../../imagenes/puntos/" . $nombreImagen;

if (!file_exists($rutaImagen)) {
    generarImagen($Puntos, $rutaImagen);
}
// Comprobar envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valores["coordX"] = $_POST["coordX"];
    $valores["coordY"] = $_POST["coordY"];
    $valores["colores"] = $_POST["colores"];
    $valores["grosor"] = $_POST["grosor"];

    // Validar coordenada X
    $x = $valores["coordX"];

    if ($x === "" || !validaEntero($x, 0, 500, 0)) {
        $errores["errorX"] = true;
    }

    // Validar coordenada Y
    $y = $valores["coordY"];

    if ($y === "" || !validaEntero($y, 0, 500, 0)) {
        $errores["errorY"] = true;
    }

    // Validar color
    if (!validaRango($valores["colores"], Punto::COLORES, 2)) {
        $errores["errorColor"] = true;
    }

    // Validar grosor
    if (!validaRango((int)$valores["grosor"], Punto::GROSORES, 2) || $valores["grosor"] === "") {
        $errores["errorGrosor"] = true;
    }

    // Si no hay errores, crear el punto
    if (!in_array(true, $errores, true)) {

        try {
            $punto = new Punto($x, $y, $valores["colores"], (int)$valores["grosor"]);
            $Puntos[] = $punto;

            generarImagen($Puntos, $rutaImagen);

            $linea = $x . " ; " . $y . " ; " .
            $valores["colores"] . " ; " .
            $valores["grosor"] . PHP_EOL;

            file_put_contents($rutaFichero, $linea, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            $errores["errorGeneral"] = true;
        }
    }
}

// Dibuja la vista
inicioCabecera("Ejercicio 7");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 7");
cuerpo($errores, $valores, $Puntos, $urlImagen);
finCuerpo();


// Vista
function cabecera()
{
}

function cuerpo(array $errores, array $valores, array $Puntos, string $urlImagen)
{
    
?>
    <form action="index.php" method="post">

        <h2>Coordenadas:</h2>
        
        <?php if ($errores["errorGeneral"]) { ?>
            <p class="error">Error al generar el punto.</p>
        <?php } ?>
        <label for="coordX">Coordenada X:</label> <br>
        <input type="text" name="coordX" id="coordX" value="<?php echo $valores["coordX"] ?>"> <br>

        <?php if ($errores["errorX"]) { ?>
            <p class="error">Error. El número debe estar entre 0 y 500</p>
        <?php } ?>


        <label for="coordY">Coordenada Y:</label> <br>
        <input type="text" name="coordY" id="coordY" value="<?php echo $valores["coordY"]; ?>"> <br>

        <?php if ($errores["errorY"]) { ?>
            <p class="error">Error. El número debe estar entre 0 y 500</p>
        <?php } ?>
        
        <label for="colores">Color:</label> <br>
        <select name="colores" id="colores">
            <option value="">Selecciona un color</option>
            <?php foreach (Punto::COLORES as $clave => $valor) { ?>
                <option value="<?php echo $clave; ?>"> <?php echo $valor["nombre"]; ?></option>
            <?php } ?>
        </select>

        <?php if ($errores["errorColor"]) { ?>
            <p class="error">Debes seleccionar un color</p>
        <?php } ?>

        <br><br>


        <label>Grosor:</label> <br>

        <?php foreach (Punto::GROSORES as $clave => $valor) { ?>
            <input type="radio" name="grosor" value="<?php echo $clave; ?>" <?php if ($clave === 1) { ?> checked <?php } ?>>

            <label>
                <?php echo $valor; ?>
            </label>
        <?php } ?>
        <?php if ($errores["errorGrosor"]) { ?>
            <p class="error">Debes seleccionar un grosor</p>
        <?php } ?>
        <br><br>
        <input class="boton" type="submit" name="guardar" value="Guardar">

        <br> <br>
        <textarea name="puntos" cols="40" rows="10" readonly><?php 
                for ($cont = 0; $cont < count($Puntos); $cont++) {
                    echo $Puntos[$cont] . "\n"; 
                }
            ?>
        </textarea>
        <br>
        <img src="<?php echo $urlImagen; ?>" alt="">
        <br>
        <a href="./imagen.php" class="boton">Descargar Imagen</a>
    </form>
<?php
}