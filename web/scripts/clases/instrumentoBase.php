<?php
class instrumentoBase {
    private string $descripcion;
    private int $edad;

    public function __construct(string $descripcion, int $edad = 10) {
        $this->descripcion = $descripcion;
        $this->edad = $edad;
    }

    public function setDescripcion(string $descripcion) : void {$this->descripcion = $descripcion;}
    public function getDescripcion () : string { return $this->descripcion; }

    public function setEdad(int $edad) : void {$this->edad = $edad;}
    public function getEdad () : int{ return $this->edad; }

    public function envejecer() : void {
        $this->edad = $this->edad + 1;
    }

} 