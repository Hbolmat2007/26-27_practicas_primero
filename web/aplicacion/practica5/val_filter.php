<?php
namespace VARFILTER;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {
    // Comprobar que $var está entre el mínimo y el máximo. Si lo está, devuelve el valor de $var, si no, false
    $resultado = filter_var($var, FILTER_VALIDATE_INT, [
    "options" => [
        "min_range" => $min,
        "max_range" => $max
    ]
    ]);

    // Si no está entre el mínimo y el máximo, devuelve false
    if ($resultado === false) {
        $var = $defecto;
        return false;
    } else {
        return true;
    }
}

function validaReal(float &$var, float $min, float $max, float $defecto):bool {
    $resultado = filter_var($var, FILTER_VALIDATE_FLOAT, [
    "options" => [
        "min_range" => $min,
        "max_range" => $max
    ]
    ]);
    if ($resultado === false) {
        $var = $defecto;
        return false;
    } else {
        return true;
    }
}

// No hay métodos para validar fechas en "Filter", así qur usaré el mismo código que en var_normal

function validaFecha(string &$var, string $defecto, bool $siglo1 = false):bool {
    
    $fecha = explode("/", $var);
    if ((count($fecha) !== 3)) {
        $var = $defecto;
        return false;
    }

    // Se comprueba si es una fecha correcta (Para que, por ejemplo, no se acepten fechas como el 30 de febrero)
    // Asumo que la fecha está en formato día/mes/año
    if (!checkdate($fecha[1], $fecha[0], $fecha[2])) {
        $var = $defecto;
        return false;
    }

    // A partir de aquí asumimos que la fecha es correcta

    // Si el mes o el día se están representando solo con un dígito, se le añade un 0 a la izquierda.
    if (mb_strlen($fecha[0]) == 1) { $fecha[0] = "0" . $fecha[0]; }
    if (mb_strlen($fecha[1]) == 1) { $fecha[1] = "0" . $fecha[1]; }
    // Añade "20" al inicio de la fecha si es de dos cifras. 
    // Podría ser incorrecto si se está trabajando con una fecha anterior al siglo II
    // Por eso añadí un parámetro extra opcional, para que se especifique si se está trabajando con una fecha del 1er siglo DC
    if (!$siglo1) {
        if (mb_strlen($fecha[2]) == 2) { $fecha[2] = "20" . $fecha[0]; }
    }
    
    $var = $fecha[0] . "/" . $fecha[1] . "/" . $fecha[2];  
    return true;
}

// Tampoco hay una función para la hora en Filter

function validaHora(string &$var, string $defecto):bool {
    // Dividimos la hora que se nos pasa en hora, minuto y segundo
    $hora = explode(":", $var);

    // Si la hora no tiene 3 elementos, el usuario no la ha introducido bien 
    if (count($hora) !== 3) {
        $var = $defecto;
        return false;
    }

    // Si la hora contiene valores no válidos (Negativos, o, por ejemplo, que la hora sea mayor a 25), no es válida
    if (($hora[0] >= 24 || $hora[0] < 0) || ($hora[1] >= 60 || $hora[1]< 0) || ($hora[2] >= 60 || $hora[2] < 0 )) {
        $var = $defecto;
        return false;
    }

    // Se le añaden los ceros a la izquierda a cada unidad (Si aplica)
    if (mb_strlen($hora[0]) == 1) { $hora[0] = "0" . $hora[0]; }
    if (mb_strlen($hora[1]) == 1) { $hora[0] = "0" . $hora[0]; }
    if (mb_strlen($hora[2]) == 1) { $hora[0] = "0" . $hora[0]; }

    // Construimos la hora.
    $var = $hora[0] . ":" . $hora[1] . ":" . $hora[2];
    return true;
}

function validaEmail(string &$var, string $defecto):bool {
    // el atributo FILTER_VALIDATE_EMAIL valida un email
    if (filter_var($var, FILTER_VALIDATE_EMAIL)) { return true; } 
    else { $var = $defecto; return false; }
}


function validaCadena(string &$var, int $longitud, string $defecto):bool {
    // Si la longitud es negativa, devuelve falso automáticamente.
    if ($longitud < 0) return false;

    // No hay una función que use filter_var para regular la longitud. Podemos hacer una "Ñapa" con expresiones regulares.
    $booleano = filter_var($var, FILTER_VALIDATE_REGEXP, [
        'options' => [
            'regexp' => '/^.{0,' . $longitud . '}$/'
        ]
    ]);
    if (!$booleano) {
        $var = $defecto;
    }
    return $booleano;
}
function validaExpresion(string &$var, string $expresion, string $defecto):bool {
    // Se usa Filter_validate_regexp para validar
    $booleano = filter_var($var, FILTER_VALIDATE_REGEXP, [
        'options' => [
            'regexp' => $expresion
        ]
    ]);

    if (!$booleano) {
        $var = $defecto;
    }
    return $booleano;
}

// No se puede usar la librería Filter aquí, así que incluyo una pequeña mejora de in_array
function validaRango(mixed $var, array $posibles, int $tipo=1):bool {
    $encontrado = false;
    if ($tipo === 1) {
        $encontrado = in_array($var, $posibles, true);
    } else if($tipo === 2) {
        $claves = array_keys($posibles);
        $encontrado = in_array($var, $claves, true);
    }
    return $encontrado;    
}