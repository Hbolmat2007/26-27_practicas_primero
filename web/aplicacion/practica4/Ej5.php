<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Se incluye 
include_once(dirname(__FILE__) . "/../../scripts/clases/Persona.php");



// Controlador
$p1 = Persona::registrarPersona(null, null, null, null, null);
$p2 = Persona::registrarPersona("Hugo Bolaños", "20/07/2007", "Calle Pino 9", "Estación De Salinas", EstadoCivil::SOLTERO);

// Dibuja la vista
inicioCabecera("Ejercicio flautas");
cabecera();
finCabecera();

inicioCuerpo("Ejercicio 5");
cuerpo($p1, $p2);
finCuerpo();

// Vista
function cabecera()
{
}

function cuerpo(Persona $p1, Persona $p2)
{
?>
    <p>Prueba de Personas:</p>
    <p>Persona 1 (Por defecto): <?php echo $p1; ?></p>
    <p>Persona 2: <?php echo $p2; ?></p>
<?php
}