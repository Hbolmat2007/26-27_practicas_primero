<?php
namespace VARNORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {
    // Valor booleano que devuelve true si el valor está entre los límites y false si no lo está
    $booleano = (($var >= $min) && ($var <= $max));
    // Si no está en los límites, se sustituye por el valor por defecto
    if (!$booleano) { $var = $defecto; }
    // Devuelve true si el valor está en sus límites o false si no lo está
    return $booleano;
}

function validaReal(float &$var, float $min, float $max, float $defecto):bool {
    $booleano = (($var >= $min) && ($var <= $max));
    if (!$booleano) { $var = $defecto; }
    return $booleano;
}
function validaFecha(string &$var, string $defecto, bool $siglo1 = false):bool {
    // Se divide la fecha en un array,
    $fecha = explode("/", $var);

    // Si el array no tiene 3 elementos, es porque el usuario no ha introducido bien la fecha (o no ha usado barras)
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

    // A partir de aquí asumimos que la fecha es correcta. Falta formatearla.

    // Si el mes o el día se están representando solo con un dígito, se le añade un 0 a la izquierda.
    if (mb_strlen($fecha[0]) == 1) { $fecha[0] = "0" . $fecha[0]; }
    if (mb_strlen($fecha[1]) == 1) { $fecha[1] = "0" . $fecha[1]; }
    // Añade "20" al inicio de la fecha si es de dos cifras. 
    // Podría ser incorrecto si se está trabajando con una fecha anterior al siglo II
    // Por eso añadí un parámetro extra opcional, para que se especifique si se está trabajando con una fecha del 1er siglo DC
    if (!$siglo1) {
        if (mb_strlen($fecha[2]) == 2) { $fecha[2] = "20" . $fecha[2]; }
    }
    
    $var = $fecha[0] . "/" . $fecha[1] . "/" . $fecha[2];  
    return true;
}

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


    $var = $hora[0] . ":" . $hora[1] . ":" . $hora[2];
    return true;
}

function validaEmail(string &$var, string $defecto):bool {
    // Expresión regular de correo electrónico
    $expCorreo = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    // Si es un correo electrónico válido, devuelve true
    if (preg_match($expCorreo, $var)) {
        return true;
    } 
    // Si no, devuelve false
    else {
        $var = $defecto;
        return false;
    }
}

function validaCadena(string &$var, int $longitud, string $defecto):bool {
    // Si la longitud de la variable $var es mayor que la predefinida, se pone el valor por defecto
    if (mb_strlen($var) > $longitud) {
        $var = $defecto;
        return false;
    }
    return true;
}

function validaExpresion(string &$var, string $expresion, string $defecto):bool {
    // Comprobamos si la variable se rige por la expresión regular con preg_match
    $booleano = preg_match($expresion, $var);

    if (!$booleano) { $var = $defecto; }
    return $booleano;
}

function validaRango(mixed $var, array $posibles, int $tipo=1):bool {
    // Se inicializa "Encontrado" a false. Damos por hecho que no lo vamos a encontrar, y, si lo hacemos, ya se cambiará.
    $encontrado = false;
    // Si el tipo es 1, se busca en los elementos
    if ($tipo === 1) {
        for ($cont = 0; $cont < count($posibles); $cont++) {
            // Si encontramos el valor, dejamos $encontrado a true.
            if ($var === $posibles[$cont]) {
                $encontrado = true;
            }
        }
    // si tipo es 2, buscamos en las claves
    } else if($tipo === 2) {
        // creamos un array con las claves
        $claves = array_keys($posibles);
        for ($cont = 0; $cont < count($claves); $cont++) {
            if ($var === $claves[$cont]) {
                $encontrado = true;
            }
        }
    }
    return $encontrado;    
}