<?php
class instrumentoBase {
    private string $descripcion;
    private int $edad;

    public function __construct(string $descripcion, int $edad = 10) {
        $this->descripcion = $descripcion;
        $this->edad = $edad;
    }

    public function setDescripcion(string $descripcion) {$this->descripcion = $descripcion;}
    public function getDescripcion () { return $this->descripcion; }

} 