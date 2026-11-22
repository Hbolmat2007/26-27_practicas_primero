<?php 

function navegador(): string {

    $userAgent = $_SERVER["HTTP_USER_AGENT"];

    if (mb_stripos($userAgent, "Firefox") !== false) {
        return "firefox";
    } elseif (mb_stripos($userAgent, "Edg") !== false) {
        return "edge";
    } elseif (mb_stripos($userAgent, "Chrome") !== false) {
        return "chrome";
    } elseif (mb_stripos($userAgent, "Safari") !== false) {
        return "safari";
    } else {
        return "desconocido";
    }
}

function direccionIP(): string {
    return str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);
}


function generarImagen(array $Puntos, ?string $ruta = null): void {
    // Crear una imagen de 500 x 500 píxeles
    $imagen = imagecreatetruecolor(500, 500);

    // Definimos Blanco y negro
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    // Fondo blanco
    imagefill($imagen, 0, 0, $blanco);

    // Dibujar el marco
    imagerectangle($imagen, 0, 0, 499, 499, $negro);

    // Dibujar los puntos
    for ($cont = 0; $cont < count($Puntos); $cont++) {
        $x = $Puntos[$cont]->getX();
        $y = $Puntos[$cont]->getY();

        // Obtenemos el color del punto 
        $colorRGB = $Puntos[$cont]->getColor()["rgb"];

        $color = imagecolorallocate($imagen, $colorRGB[0], $colorRGB[1], $colorRGB[2]);

        // Dejamos el radio por defecto a 10 para que vs code no de error
        $radio = 10;
        // Determinar tamaño según el grosor
        switch ($Puntos[$cont]->getGrosor()) {
            case "fino": $radio = 10; break;
            case "medio": $radio = 20; break;
            case "grueso": $radio = 30;break;
        }

        // Dibujar el punto
        imagefilledellipse($imagen, $x, $y, $radio, $radio, $color);
    }

    // Guardar imagen JPG
    if ($ruta === null) {
        imagejpeg($imagen);    
    } else {
        imagejpeg($imagen, $ruta, 90);
    }
    
}


function cargarPuntos(string $ruta): array {
    $Puntos = [];

    // Si el fichero todavía no existe, no hay puntos guardados
    if (!file_exists($ruta)) {
        return $Puntos;
    }

    // Leer todas las líneas excepto las vacías
    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    for ($cont = 0; $cont < count($lineas); $cont++) {
        $datos = explode(";", $lineas[$cont]);

        // Cada línea debe tener cuatro campos
        if (count($datos) !== 4) {
            continue;
        }

        $x = trim($datos[0]);
        $y = trim($datos[1]);
        $color = trim($datos[2]);
        $grosor = trim($datos[3]);

        // Comprobar que las coordenadas y el grosor sean enteros
        if (filter_var($x, FILTER_VALIDATE_INT) === false ||
            filter_var($y, FILTER_VALIDATE_INT) === false ||
            filter_var($grosor, FILTER_VALIDATE_INT) === false) {
            continue;
        }

        try {
            $Puntos[] = new Punto((int)$x, (int)$y, $color, (int)$grosor);
        } catch (Exception $e) {
            // Ignorar líneas que contengan datos no válidos
            continue;
        }
    }

    return $Puntos;
}
