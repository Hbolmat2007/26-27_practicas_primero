<?php
class Persona {
 /*
 propiedades nombre (string), fecha_nacimiento (string), domicilio (string), localidad (string)
y estado (EstadoCivil). 
 */
    // Variables de instancia
    private string $nombre;
    private string $fecha_nacimiento;
    private string $domicilio;
    private string $localidad;
    private EstadoCivil $estado;


    // Get y set
    public function getNombre() : string { return $this->nombre; }
    public function setNombre(string $nombre) : void { $this->nombre = $nombre; }

    public function getFechaNacimiento() : string { return $this->fecha_nacimiento; }
    public function setFechaNacimiento(string $fecha_nacimiento) : void { $this->fecha_nacimiento = $fecha_nacimiento; }

    public function getDomicilio() : string { return $this->domicilio; }
    public function setDomicilio(string $domicilio) : void { $this->domicilio = $domicilio; }

    public function getLocalidad() : string { return $this->localidad; }
    public function setLocalidad(string $localidad) : void { $this->localidad = $localidad; }

    public function getEstado() : EstadoCivil { return $this->estado; }
    public function setEstado(EstadoCivil $estado) : void { $this->estado = $estado; }

/*
Constructor privado al que no se indica ningún parámetro y que rellena las propiedades con
valores nombre “prueba”, fecha_nacimiento “01/01/2000”, domicilio “carrera 12”, localidad
“antequera” y estado “soltero”.
*/

    // Constructor privado con valores por defecto
    private function __construct() {
        $this->nombre = "Prueba";
        $this->fecha_nacimiento = "01/01/2000";
        $this->domicilio = "carrera 12";
        $this->localidad = "Antequera";
        $this->estado = EstadoCivil::SOLTERO;
    }

    // función registrarPErsona. Si se le pasan valores Null, se dejan los valores por defecto.
    public static function registrarPersona(string | null $nombre, string | null $fecha_nacimiento, string | null $domicilio, string | null $localidad, EstadoCivil | null $estado) : Persona {
        $pers = new Persona();
        if (isset($nombre)) { $pers->setNombre($nombre); }
        if (isset($fecha_nacimiento)) { $pers->setFechaNacimiento($fecha_nacimiento); }
        if (isset($domicilio)) { $pers->setDomicilio($domicilio); }
        if (isset($localidad)) { $pers->setLocalidad($localidad); }
        if (isset($estado)) { $pers->setEstado($estado); }
        return $pers;
    }

    // ToString
    public function __toString() : string {
        return $this->nombre . " es una persona " . $this->estado->descripcion() . " nacida el " . $this->fecha_nacimiento  . " y que vive en " . $this->localidad;
    }

}
