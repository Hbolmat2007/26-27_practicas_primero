<?php
function cuentaVeces(array &$array, string $cadena, int $valor1, int &$valor2): bool {
    if ($cadena === "2daw" || $cadena === "primera") {
        return false;
    }
    $valor2++;
    $array[$cadena] = $valor1;
    return true;
}

function generarCadena(int $longitud = 10) {
    if ($longitud <= 0) return false;
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $resultado = "";
    for ($cont = 0; $cont <= $longitud ;$cont++) {
        $resultado = $resultado . $caracteres[rand(0,(mb_strlen($caracteres) - 1))];
    }
    return $resultado;
}

function operaciones(int $operacion, int ... $numeros) {
    if (count($numeros) < 2) {
        return false;
    }
    if ($operacion === 1) {
        return array_sum($numeros);
    }
    else if ($operacion === 2) {
        $resultado = $numeros[0];
        for ($cont = 1; $cont < count($numeros); $cont++) {
            $resultado = $resultado - $numeros[$cont];
        }
        return $resultado;
    } else if ($operacion === 3) {
        $resultado = 1;
        for ($cont = 0; $cont < count($numeros); $cont++) {
            $resultado = $resultado * $numeros[$cont];
        }
        return $resultado;
    } else {
        $resultado = 0;
        for ($cont = 0; $cont < count($numeros); $cont++) {
            if (($cont + 1)%2 == 1) {
                $resultado = $resultado - $numeros[$cont];
            } else {
                $resultado = $resultado + $numeros[$cont];
            }
            
        }
        return $resultado;
    }
}

function devuelve(int &$valor1, int $valor2 = 10, int $valor3 = 20) {
    $resultado = $valor1 * $valor2 * $valor3;
    $valor1 = $valor1 + $valor2 + $valor3;
    return $resultado;
}

function sumar (int $valor1, int $valor2): int {
    return $valor1 + $valor2;
}

function restar (int $valor1, int $valor2): int {
    return $valor1 - $valor2;
}
function multiplicar (int $valor1, int $valor2): int {
    return $valor1 * $valor2;
}

function hacerOperacion (string $operacion, int $valor1, int $valor2) {
    if ($operacion !== "sumar" && $operacion !== "restar" && $operacion !== "multiplicar") {
        return false;
    }
    else {
        return $operacion($valor1, $valor2);
    }
}

function llamadaAFuncion(int $valor1, int $valor2, callable $callback): int {
    return $callback($valor1, $valor2);
}

function ordenar(array &$array) {
    $callback = function($valor1, $valor2) {
        if (strlen($valor1) === strlen($valor2)) {
            return 0;
        } else if (strlen($valor1) < strlen($valor2)) {
            return 1;
        } else {
            return -1;
        }
    };
    usort($array, $callback);
}