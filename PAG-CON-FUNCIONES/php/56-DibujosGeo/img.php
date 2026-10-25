<?php
// 1. Capturamos los datos enviados por la URL
$figura = isset($_GET['figura']) ? $_GET['figura'] : '';
$patron = isset($_GET['patron']) ? $_GET['patron'] : '';

$cfig = isset($_GET['cfig']) ? $_GET['cfig'] : '#800080';
$cfondo = isset($_GET['cfondo']) ? $_GET['cfondo'] : '#de0000';

// 3. Creamos la imagen
$imagen = imageCreateTrueColor(600, 600);

// 4. Convertimos los colores HEX a RGB
$cfigRGB = sscanf($cfig, "#%02x%02x%02x");
$cfondoRGB = sscanf($cfondo, "#%02x%02x%02x");

// 5. Aplicamos el color de fondo
$fondo = imageColorAllocate(
    $imagen,
    $cfondoRGB[0],
    $cfondoRGB[1],
    $cfondoRGB[2]
);

imageFill($imagen, 0, 0, $fondo);
imageinterlace($imagen, 1);

// 6. Creamos el color de la figura
$colorFigura = imageColorAllocate(
    $imagen,
    $cfigRGB[0],
    $cfigRGB[1],
    $cfigRGB[2]
);

// 3. Incluimos el archivo de funciones según la figura elegida
if ($figura == 'cuadrado') {
    include("cuadrado.php");
    if ($patron == 1) { cul($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 2) { cu2($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 3) { cu3($imagen, 60,  $colorFigura); }
    elseif ($patron == 4) { c4($imagen, 60,  $colorFigura); }
    elseif ($patron == 5) { c5($imagen, 60,  $colorFigura); }
    elseif ($patron == 6) { c6($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 7) { c7($imagen, 60, 300, 300,  $colorFigura); }
} 
elseif ($figura == 'rombo') {
    include("rombo.php");
    if ($patron == 1) { rombo1($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 2) { rombo2($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 3) { rombo3($imagen, 60,  $colorFigura); }
    elseif ($patron == 4) { rombo4($imagen, 60,  $colorFigura); }
    elseif ($patron == 5) { rombo5($imagen, 60,  $colorFigura); }
    elseif ($patron == 6) { rombo6($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 7) { rombo7($imagen, 60, 300, 300,  $colorFigura); }
}
elseif ($figura == 'triangulo') {
    include("triangulo.php");
    if ($patron == 1) { tri1($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 2) { tri2($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 3) { tri3($imagen, 60,  $colorFigura); }
    elseif ($patron == 4) { tri4($imagen, 60,  $colorFigura); }
    elseif ($patron == 5) { tri5($imagen, 60,  $colorFigura); }
    elseif ($patron == 6) { tri6($imagen, 60, 300, 300,  $colorFigura  ); }
    elseif ($patron == 7) { tri7($imagen, 60, 300, 300,  $colorFigura); }
}
elseif ($figura == 'circle') {
    include("circle.php");
    if ($patron == 1) { c1($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 2) { c2($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 3) { c3($imagen, 60,  $colorFigura); }
    elseif ($patron == 4) { c4($imagen, 60,  $colorFigura); }
    elseif ($patron == 5) { c5($imagen, 60,  $colorFigura); }
    elseif ($patron == 6) { c6($imagen, 60, 300, 300,  $colorFigura); }
    elseif ($patron == 7) { c7($imagen, 60, 300, 300,  $colorFigura); }
}

// 4. Devolvemos la imagen generada al iframe
header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>
