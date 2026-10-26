<?php
$imagen = imageCreate(600, 600);

// Recibimos los colores hexadecimales enviados por GET
$cfondo_hex = isset($_GET['cfondo']) ? $_GET['cfondo'] : '#de0000';
$cfig_hex = isset($_GET['cfig']) ? $_GET['cfig'] : '#800080';

// Convertimos Hex a RGB para el fondo de forma directa y segura
sscanf($cfondo_hex, "#%02x%02x%02x", $rf, $gf, $bf);
$fondo = imageColorAllocate($imagen, $rf, $gf, $bf);

// Pintamos todo el fondo de la imagen para que se vea el color elegido
imagefilledrectangle($imagen, 0, 0, 600, 600, $fondo);

// Convertimos Hex a RGB para la línea/figura
sscanf($cfig_hex, "#%02x%02x%02x", $rc, $gc, $bc);
$colorLinea = imageColorAllocate($imagen, $rc, $gc, $bc);

imageinterlace($imagen, 1);

// Validamos y limitamos las coordenadas entre 0 y 600
$x = isset($_GET['x']) ? max(0, min(600, intval($_GET['x']))) : 0;
$y = isset($_GET['y']) ? max(0, min(600, intval($_GET['y']))) : 0;
$x1 = isset($_GET['x1']) ? max(0, min(600, intval($_GET['x1']))) : 0;
$y1 = isset($_GET['y1']) ? max(0, min(600, intval($_GET['y1']))) : 0;

function dibujarLineaUsuario($imagen, $x, $y, $x1, $y1, $color) {
    imageline($imagen, $x, $y, $x1, $y1, $color);
}

// Dibujamos la línea con el color correspondiente
dibujarLineaUsuario($imagen, $x, $y, $x1, $y1, $colorLinea);

header("Content-type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>