<?php

use function VARFILTER\validaRango;
use function VARNORMAL\validaEntero;
use function VARNORMAL\validaRango as VARNORMALValidaRango;

include_once(__DIR__ . "/../../aplicacion/practica5/val_normal.php");
class Punto {
    private int $_x;
    private int $_y;
    private array $_color;
    private string $_grosor;

    public const COLORES = [
        "skyblue" =>["nombre" =>"Celeste", "rgb" => [135,206,235]],
        "black" =>["nombre" =>"Negro", "rgb" => [0,0,0]],
        "yellow" =>["nombre" =>"Amarillo", "rgb" => [255,215,0]],
        "orange" =>["nombre" =>"Naranja", "rgb" => [255,140,0]],
        "purple" =>["nombre" =>"Morado", "rgb" => [128,0,128]]
    ];

    public const GROSORES =  [1 =>"fino", 2 => "medio", 3 => "grueso"];

    public function __construct(int $x, int $y, string $color, int $grosor) {
        if (!validaEntero($x, 0, 20000, 0)) {
            throw new Exception("Valor de X menor de 0 o mayor de 20000");
        } else {
            $this->_x = $x;
        }

        if (!validaEntero($y, 0, 20000, 0)) {
            throw new Exception("Valor de X menor de 0 o mayor de 20000");
        } else {
            $this->_y = $y;
        }

        if (!VARNORMALValidaRango($color, self::COLORES, 2)) {
            throw new Exception("Color \"" . $color . "\" desconocido.");
        } else {
            $this->_color = self::COLORES[$color];
        }

        if (!VARNORMALvalidaRango($grosor,self::GROSORES, 2)) {
            throw new Exception("Grosor no válido.");
        } else {
            $this->_grosor = self::GROSORES[$grosor];
        }
    }

    public function getGrosor() : string { return $this->_grosor; }
    public function setGrosor(int $num) : bool {
        if (!ValidaRango($num, self::GROSORES, 2)) { return false; }
        $this->_grosor = self::GROSORES[$num];
        return true;
    }

    public function getX() : int { return $this->_x; }
    public function setX(int $num) : bool {
        if (!validaEntero($num, 0, 20000, $this->getX())) { return false; }
        $this->_x = $num;
        return true;
    }

    public function getY() : int { return $this->_y; }
    public function setY(int $num) : bool {
        if (!validaEntero($num, 0, 20000, $this->getY())) { return false; }
        $this->_y = $num;
        return true;
    }

    public function getColor() : array { return $this->_color; }
    public function setColor(string $nombre) : bool {
        if (!validaRango($nombre, self::COLORES, 2)) { return false; }
        $this->_color = self::COLORES[$nombre];
        return true;
    }

    public function __toString() {
        return "X:" . $this->getX() . "; Y:" . $this->getY() . "; Color: " . $this->getColor()["nombre"] . "; Grosor: " . $this->getGrosor();
    }
}