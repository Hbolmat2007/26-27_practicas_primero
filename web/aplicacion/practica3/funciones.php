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
    if ($longitud >= 0) return false;
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $resultado = "";
    for ($cont = 0; $cont <= 10 ;$cont++) {
        $resultado = $resultado . $caracteres[rand(0,(mb_strlen($caracteres) - 1))];
    }
    return $resultado;
}