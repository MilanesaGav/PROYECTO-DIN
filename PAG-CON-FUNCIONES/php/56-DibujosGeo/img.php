<?php
// 1. Capturamos los datos enviados por la URL
$figura = isset($_GET['figura']) ? $_GET['figura'] : '';
$patron = isset($_GET['patron']) ? $_GET['patron'] : '';

// 2. Creamos la imagen base de 600x600 con fondo rojo
$imagen = imageCreate(600, 600);
$fondo = imageColorAllocate($imagen, 222, 0, 0);
imageinterlace($imagen, 1);

// 3. Incluimos el archivo de funciones según la figura elegida
if ($figura == 'cuadrado') {
    include("cuadrado.php");
    if ($patron == 1) { cul($imagen, 60, 300, 300); }
    elseif ($patron == 2) { cu2($imagen, 60, 300, 300); }
    elseif ($patron == 3) { cu3($imagen, 60); }
    elseif ($patron == 4) { c4($imagen, 60); }
    elseif ($patron == 5) { c5($imagen, 60); }
    elseif ($patron == 6) { c6($imagen, 60, 300, 300); }
    elseif ($patron == 7) { c7($imagen, 60, 300, 300); }
} 
elseif ($figura == 'rombo') {
    include("rombo.php");
    if ($patron == 1) { rombo1($imagen, 60, 300, 300); }
    elseif ($patron == 2) { rombo2($imagen, 60, 300, 300); }
    elseif ($patron == 3) { rombo3($imagen, 60); }
    elseif ($patron == 4) { rombo4($imagen, 60); }
    elseif ($patron == 5) { rombo5($imagen, 60); }
    elseif ($patron == 6) { rombo6($imagen, 60, 300, 300); }
    elseif ($patron == 7) { rombo7($imagen, 60, 300, 300); }
}
elseif ($figura == 'triangulo') {
    include("triangulo.php");
    if ($patron == 1) { tri1($imagen, 60, 300, 300); }
    elseif ($patron == 2) { tri2($imagen, 60, 300, 300); }
    elseif ($patron == 3) { tri3($imagen, 60); }
    elseif ($patron == 4) { tri4($imagen, 60); }
    elseif ($patron == 5) { tri5($imagen, 60); }
    elseif ($patron == 6) { tri6($imagen, 60, 300, 300); }
    elseif ($patron == 7) { tri7($imagen, 60, 300, 300); }
}
elseif ($figura == 'circle') {
    include("circle.php");
    if ($patron == 1) { c1($imagen, 60, 300, 300); }
    elseif ($patron == 2) { c2($imagen, 60, 300, 300); }
    elseif ($patron == 3) { c3($imagen, 60); }
    elseif ($patron == 4) { c4($imagen, 60); }
    elseif ($patron == 5) { c5($imagen, 60); }
    elseif ($patron == 6) { c6($imagen, 60, 300, 300); }
    elseif ($patron == 7) { c7($imagen, 60, 300, 300); }
}

// 4. Devolvemos la imagen generada al iframe
header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>
