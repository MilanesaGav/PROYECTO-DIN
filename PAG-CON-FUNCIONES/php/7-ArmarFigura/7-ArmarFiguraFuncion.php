<?php
$imagen = imageCreate(600, 600);

// Recibimos los colores hexadecimales enviados por GET
$cfondo_hex = isset($_GET['cfondo']) ? $_GET['cfondo'] : '#de0000';
$cfig_hex = isset($_GET['cfig']) ? $_GET['cfig'] : '#800080';

// Convertimos Hex a RGB para el fondo
list($rf, $gf, $bf) = sscanf($cfondo_hex, "#%02x%02x%02x");
$fondo = imageColorAllocate($imagen, $rf, $gf, $bf);

// Convertimos Hex a RGB para la línea/figura
list($rc, $gc, $bc) = sscanf($cfig_hex, "#%02x%02x%02x");
$colorLinea = imageColorAllocate($imagen, $rc, $gc, $bc);

imageinterlace($imagen, 1);

$x = isset($_GET['x']) ? intval($_GET['x']) : 0;
$y = isset($_GET['y']) ? intval($_GET['y']) : 0;
$x1 = isset($_GET['x1']) ? intval($_GET['x1']) : 0;
$y1 = isset($_GET['y1']) ? intval($_GET['y1']) : 0;

function dibujarLineaUsuario($imagen, $x, $y, $x1, $y1, $color) {
    // Dibujamos la línea usando el color recibido por parámetro
    imageline($imagen, $x, $y, $x1, $y1, $color);
}

// Pasamos $colorLinea a la función
dibujarLineaUsuario($imagen, $x, $y, $x1, $y1, $colorLinea);

header("Content-type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>