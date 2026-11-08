<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_normal.php");
include_once(dirname(__FILE__) . "/val_filter.php");

// Controlador



// Valores iniciales del formulario
$valores = [
    "nombre" => "",
    "contrasena" => "",
    "fechaNacimiento" => "",
    "diaCarnet" => "",
    "mesCarnet" => "",
    "anioCarnet" => "",
    "hora" => "",
    "estado" => "",
    "estudios" => [],
    "hermanos" => "0",
    "sueldo" => "1100"
];

// Errores iniciales
$errores = [
    "nombre" => false,
    "contrasena" => false,
    "fechaNacimiento" => false,
    "fechaCarnet" => false,
    "hora" => false,
    "estado" => false,
    "estudios" => false,
    "hermanos" => false,
    "sueldo" => false
];

$hayErrores = false;

// Recoger datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valores['nombre'] = mb_strtoupper($_POST['nombre'] ?? "");
    $valores['contrasena'] = $_POST['contrasena'] ?? "";
    $valores['fechaNacimiento'] = $_POST['fechaNacimiento'] ?? "";
    $valores['diaCarnet'] = $_POST['diaCarnet'] ?? "";
    $valores['mesCarnet'] = $_POST['mesCarnet'] ?? "";
    $valores['anioCarnet'] = $_POST['anioCarnet'] ?? "";
    $valores['hora'] = $_POST['hora'] ?? "";
    $valores['estado'] = $_POST['estado'] ?? "";
    $valores['estudios'] = $_POST['estudios'] ?? [];
    $valores['hermanos'] = $_POST['hermanos'] ?? "";
    $valores['sueldo'] = $_POST['sueldo'] ?? "";

    // Validar datos
    
    if ($valores['nombre'][0] == 'H' || !(VARNORMAL\validaCadena($valores['nombre'],25,$valores['nombre'])) || $valores['nombre'] == "") {
        $errores["nombre"] = true;
    }
    
    $expregular = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[$_\-;<>@]).+$/';
    
    if (!(VARNORMAL\validaCadena($valores["contrasena"],15,$valores["contrasena"])) || !preg_match($expregular, $valores["contrasena"])) {
        $errores["contrasena"] = true;
    }

    if (!VARNORMAL\validaFecha($valores["fechaNacimiento"], $valores["fechaNacimiento"])) {
        $errores["fechaNacimiento"] = true;
    }

    // Construir fecha del carnet
    $fechaCarnet = $valores['anioCarnet'] . "-" . $valores['mesCarnet'] . "-" . $valores['diaCarnet'];

    try {
        $fechaNac = new DateTime($valores['fechaNacimiento']);
        $fechaCarnet = new DateTime($fechaCarnet);
        $mayoriaEdad = clone $fechaNac;
        $mayoriaEdad->add(new DateInterval('P18Y'));
        if ($fechaCarnet < $mayoriaEdad) {
            $errores['fechaCarnet'] = true;
        }
    } catch (Exception $e) {
        $errores['fechaCarnet'] = true;
    }

    if (!VARNORMAL\validaHora($valores["hora"], $valores["hora"])) {
        $errores["hora"] = true;
    }

    if ($valores["estado"] == null || $valores["estado"] == 5) {
        $errores["estado"] = true;
    }


    if (!is_array($valores['estudios']) ||
        count($valores['estudios']) === 0 ||
        !empty(array_diff($valores['estudios'], ["0", "1", "2", "3", "4", "5"])) ||
        (in_array("0", $valores['estudios'], true) && count($valores['estudios']) > 1)) {
        
        $errores['estudios'] = true;
    }

    if (!VARNORMAL\validaEntero($valores["hermanos"], 0, 20, 0)) {
        $errores["hermanos"] = true;
    }
    
    if (!VARNORMAL\validaReal($valores["sueldo"], 1000, 150000, 1100)) {
        $errores["hermanos"] = true;
    }

    $hayErrores = in_array(true, $errores, true);
}


// Dibuja la vista
inicioCabecera("Ejercicio 2");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 2");
if ($hayErrores) {
    cuerpo($valores, $errores);
} else {
    resumen($valores);
}


finCuerpo();


// Vista

function cabecera()
{
}


function cuerpo(array $valores, array $errores)
{
    formulario($valores, $errores);
}


function formulario(array $valores, array $errores)
{
?>

    <h2>Datos personales</h2>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">

        <!-- Nombre -->
        <p>
            <label for="nombre">Nombre:</label><br>
            <input class="for_texto" type="text" id="nombre" name="nombre"
                   value="<?= htmlspecialchars($valores['nombre']) ?>">
        </p>

        <?php if ($errores['nombre']) { ?>
            <p class="error">Error en el nombre.</p>
        <?php } ?>


        <!-- Contraseña -->
        <p>
            <label for="contrasena">Contraseña:</label><br>
            <input class="for_texto" type="password" id="contrasena"
                   name="contrasena" maxlength="15">
        </p>

        <?php if ($errores['contrasena']) { ?>
            <p class="error">Error en la contraseña.</p>
        <?php } ?>


        <!-- Fecha de nacimiento -->
        <p>
            <label for="fechaNacimiento">Fecha de nacimiento:</label><br>
            <input class="for_texto" type="text" id="fechaNacimiento"
                   name="fechaNacimiento" placeholder="DD/MM/AAAA"
                   value="<?= htmlspecialchars($valores['fechaNacimiento']) ?>">
        </p>

        <?php if ($errores['fechaNacimiento']) { ?>
            <p class="error">Fecha de nacimiento incorrecta.</p>
        <?php } ?>


        <!-- Fecha de carnet -->
        <p>
            <label>Fecha de carnet:</label><br>

            Día:
            <input class="for_texto" type="number" name="diaCarnet"
                   min="1" max="31"
                   value="<?= htmlspecialchars($valores['diaCarnet']) ?>">

            Mes:
            <input class="for_texto" type="number" name="mesCarnet"
                   min="1" max="12"
                   value="<?= htmlspecialchars($valores['mesCarnet']) ?>">

            Año:
            <input class="for_texto" type="number" name="anioCarnet"
                   value="<?= htmlspecialchars($valores['anioCarnet']) ?>">
        </p>

        <?php if ($errores['fechaCarnet']) { ?>
            <p class="error">Fecha de carnet incorrecta.</p>
        <?php } ?>


        <!-- Hora -->
        <p>
            <label for="hora">Hora de levantarse:</label><br>
            <input class="for_texto" type="text" id="hora" name="hora"
                   placeholder="HH:MM"
                   value="<?= htmlspecialchars($valores['hora']) ?>">
        </p>

        <?php if ($errores['hora']) { ?>
            <p class="error">Hora incorrecta.</p>
        <?php } ?>


        <!-- Estado -->
        <p>
            <strong>Estado:</strong><br>

            <input type="radio" name="estado" value="1"
                <?= $valores['estado'] == "1" ? "checked" : "" ?>>
            Estudiante<br>

            <input type="radio" name="estado" value="2"
                <?= $valores['estado'] == "2" ? "checked" : "" ?>>
            En paro<br>

            <input type="radio" name="estado" value="3"
                <?= $valores['estado'] == "3" ? "checked" : "" ?>>
            Trabajando<br>

            <input type="radio" name="estado" value="4"
                <?= $valores['estado'] == "4" ? "checked" : "" ?>>
            Jubilado<br>

            <input type="radio" name="estado" value="5"
                <?= $valores['estado'] == "5" ? "checked" : "" ?>>
            Incorrecta
        </p>

        <?php if ($errores['estado']) { ?>
            <p class="error">Debes seleccionar un estado válido.</p>
        <?php } ?>


        <!-- Estudios -->
        <p>
            <strong>Estudios:</strong><br>

            <input type="checkbox" name="estudios[]" value="0"
                <?= in_array("0", $valores['estudios']) ? "checked" : "" ?>>
            Sin estudios<br>

            <input type="checkbox" name="estudios[]" value="1"
                <?= in_array("1", $valores['estudios']) ? "checked" : "" ?>>
            Primaria<br>

            <input type="checkbox" name="estudios[]" value="2"
                <?= in_array("2", $valores['estudios']) ? "checked" : "" ?>>
            Secundaria<br>

            <input type="checkbox" name="estudios[]" value="3"
                <?= in_array("3", $valores['estudios']) ? "checked" : "" ?>>
            Bachillerato<br>

            <input type="checkbox" name="estudios[]" value="4"
                <?= in_array("4", $valores['estudios']) ? "checked" : "" ?>>
            Ciclo formativo<br>

            <input type="checkbox" name="estudios[]" value="5"
                <?= in_array("5", $valores['estudios']) ? "checked" : "" ?>>
            Universitarios<br>

            <input type="checkbox" name="estudios[]" value="6"
                <?= in_array("6", $valores['estudios']) ? "checked" : "" ?>>
            Incorrecta
        </p>

        <?php if ($errores['estudios']) { ?>
            <p class="error">Debes seleccionar estudios válidos.</p>
        <?php } ?>


        <!-- Hermanos -->
        <p>
            <label for="hermanos">Número de hermanos:</label><br>
            <input class="for_texto" type="number" id="hermanos"
                   name="hermanos"
                   value="<?= htmlspecialchars($valores['hermanos']) ?>">
        </p>

        <?php if ($errores['hermanos']) { ?>
            <p class="error">Número de hermanos incorrecto.</p>
        <?php } ?>


        <!-- Sueldo -->
        <p>
            <label for="sueldo">Sueldo (€):</label><br>
            <input class="for_texto" type="number" id="sueldo"
                   name="sueldo" step="0.01"
                   value="<?= htmlspecialchars($valores['sueldo']) ?>">
        </p>

        <?php if ($errores['sueldo']) { ?>
            <p class="error">Sueldo incorrecto.</p>
        <?php } ?>


        <!-- Botones -->
        <p>
            <input class="boton" type="submit" value="Enviar">
            <input class="boton" type="reset" value="Limpiar">
        </p>

    </form>

<?php
}

function resumen(array $valores)
{
    $estados = [
        1 => "Estudiante",
        2 => "En paro",
        3 => "Trabajando",
        4 => "Jubilado"
    ];

    $estudios = [
        0 => "Sin estudios",
        1 => "Primaria",
        2 => "Secundaria",
        3 => "Bachillerato",
        4 => "Ciclo formativo",
        5 => "Universitarios"
    ];

    echo "<h2>Resumen de los datos</h2>";

    echo "<p>Nombre: " . htmlspecialchars($valores['nombre'], ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>Contraseña: " . htmlspecialchars($valores['contrasena'], ENT_QUOTES, 'UTF-8') . "</p>";

    echo "<p>Fecha de nacimiento: " . htmlspecialchars($valores['fechaNacimiento'], ENT_QUOTES, 'UTF-8') . "</p>";

    echo "<p>Fecha del carnet: "
        . htmlspecialchars($valores['diaCarnet'] . "/" . $valores['mesCarnet'] . "/" . $valores['anioCarnet'], ENT_QUOTES, 'UTF-8')
        . "</p>";

    echo "<p>Hora de levantarse: " . htmlspecialchars($valores['hora'], ENT_QUOTES, 'UTF-8') . "</p>";

    echo "<p>Estado: " . $estados[$valores['estado']] . "</p>";

    echo "<p>Estudios:</p><ul>";
    foreach ($valores['estudios'] as $codigo) {
        echo "<li>" . $estudios[$codigo] . "</li>";
    }
    echo "</ul>";

    echo "<p>Hermanos: " . htmlspecialchars($valores['hermanos'], ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>Sueldo: " . htmlspecialchars($valores['sueldo'], ENT_QUOTES, 'UTF-8') . " €</p>";
}