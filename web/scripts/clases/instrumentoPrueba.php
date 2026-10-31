<?php
//Se declara la clase instrumentoBase
class instrumentoPrueba {

    protected static int $contador = 1;
    // Se declaran las variables de instancia
    private string $descripcion;
    private int $edad;
    private int $orden;

    // Se declara el constructor
    public function __construct(string $descripcion, int $edad = 10) {
        $this->descripcion = $descripcion;
        $this->edad = $edad;
        $this->orden = self::$contador;
        self::$contador++;
    }

    // Get y Set de Descripcion
    public function setDescripcion(string $descripcion) : void {$this->descripcion = $descripcion;}
    public function getDescripcion () : string { return $this->descripcion; }

    // Get y Set de la Edad
    public function setEdad(int $edad) : void {$this->edad = $edad;}
    public function getEdad () : int{ return $this->edad; }

    // Get del orden (Supoiendo que no se modifica)
    public function getOrden() : int { return $this->orden; }

    // Función de envejecer
    public function envejecer() : void {
        $this->edad = $this->edad + 1;
    }

    // Funciones abstractas (No se pueden declarar si la clase no es abstracta)

    //public abstract function sonido() : string;
    //public abstract function afinar() : string;

    public function __toString() : string {
        return "Instrumento con descripción " . $this->descripcion . ", instancia " . $this->orden . " de un total de " . self::$contador . ". Tiene " . $this->edad . " años. La clase es " . get_class($this);
    }
}