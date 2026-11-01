<?php
// Se define la clase como final para que no se pueda heredar de ella
final class flauta extends InstrumentoViento implements IFabricable {
    private function __construct(string $material = "madera", int $edad = 15) {
        parent::__construct($material, $edad);
    }

    #[Override]
    public function metodoFabricacion(): string {
        return "Inyectar metal o plástico en el molde. Si se quiere hacer de madera, hay que tallarla.";
    }

    #[Override]
    public function metodoReciclaje(): string {
        return "Llevar al punto Limpio";
    }

    public static function crearDesdeArray(array $objeto) : flauta {
        if (!isset($objeto["material"])) { $MAT = "madera"; }
        else { $MAT = $objeto["material"]; }
        
        if (!isset($objeto["edad"])) { $ED = 15; } 
        else { $ED = $objeto["edad"]; }

        return new flauta($MAT, $ED);
    }

    public function __clone() {
        $this->setEdad(0);
    }
}