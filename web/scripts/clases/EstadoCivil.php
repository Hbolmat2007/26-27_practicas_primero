<?php
enum EstadoCivil : int {
    case SOLTERO = 10;
    case CASADO = 20;
    case PAREJA = 30;
    case VIUDO = 40;

    public function descripcion() : string {
        $str = "";
        switch($this->value) {
            case 10: $str = "soltera"; break;
            case 20: $str = "casada"; break;
            case 30: $str = "con pareja"; break;
            case 40: $str = "viuda"; break;
            default: $str = "Otro";
        }
        return $str;
    }

    public function valor() : int {
        return $this->value;
    }

    public static function casos() : array {
        return EstadoCivil::cases();        
    }
}