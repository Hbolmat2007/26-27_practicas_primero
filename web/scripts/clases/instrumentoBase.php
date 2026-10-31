<?php
//Se declara la clase instrumentoBase
abstract class instrumentoBase {
    protected static int $contador;
    // Se declaran las variables de instancia
    private string $descripcion;
    private int $edad;

    // Se declara el constructor
    public function __construct(string $descripcion, int $edad = 10) {
        $this->descripcion = $descripcion;
        $this->edad = $edad;
    }

    // Get y Set de Descripcion
    public function setDescripcion(string $descripcion) : void {$this->descripcion = $descripcion;}
    public function getDescripcion () : string { return $this->descripcion; }

    // Get y Set de la Edad
    public function setEdad(int $edad) : void {$this->edad = $edad;}
    public function getEdad () : int{ return $this->edad; }

    // Función de envejecer
    public function envejecer() : void {
        $this->edad = $this->edad + 1;
    }

    // Funciones abstractas (No se pueden declarar si la clase no es abstracta)

    public abstract function sonido() : string;
    public abstract function afinar() : string;

} 