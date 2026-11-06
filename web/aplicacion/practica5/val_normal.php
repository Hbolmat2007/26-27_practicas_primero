<?php
namespace VARNORMAL;

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {
    $booleano = (($var >= $min) && ($var <= $max));
    if (!$booleano) { $var = $defecto; }
    return $booleano;
}