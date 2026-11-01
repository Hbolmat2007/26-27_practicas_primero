<?php
include_once(dirname(__FILE__) . "/instrumentoBase.php");
class InstrumentoViento extends instrumentoBase {
    // Atributo material, al que solo acceden las clases hijas y estamisma
    protected string $material;

    // Constructor con edad por defecto de 15
    //#[\Override]
    public function __construct(string $material, int $edad = 15)
    {
        parent::__construct("Instrumento de viento", $edad);
        $this->material = $material;
    }
    // función de sonido que reemplaza la de la clase "Instrumento base"
    #[\Override]
    public function sonido() : string {
        return "fiuuu";
    }

    // Función de afinar, que las clases hijas no pueden reemplazar
    #[\Override]
    public final function afinar() : string {
        return "Limpiar la lengüeta y el interior del instrumento";
    }

    // Función __toString, que sirve para mostrar texto cuando se le haga echo a algún objeto
    #[\Override]
    public function __toString() : string {
        return parent::__toString() . ". Instrumento de material " . $this->material;
    }


}