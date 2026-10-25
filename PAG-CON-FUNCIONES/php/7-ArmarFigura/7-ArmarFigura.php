<?php
$imagen = imageCreate(600,600);
$fondo=imageColorAllocate($imagen,222,0,0);
imageinterlace($imagen,1);


$x = isset($_GET['x']) ? intval($_GET['x']) : 0;
$y = isset($_GET['y']) ? intval($_GET['y']) : 0;
$x1 = isset($_GET['x1']) ? intval($_GET['x1']) : 0;
$y1 = isset($_GET['y1']) ? intval($_GET['y1']) : 0;

function dibujarLineaUsuario($imagen, $x, $y, $x1, $y1) {
    // Definimos el color de la línea (por ejemplo, violeta: 128, 0, 128)
    $colorLinea = imageColorAllocate($imagen, 128, 0, 128);
    
    // Dibujamos la línea con los datos ingresados
    imageline($imagen, $x, $y, $x1, $y1, $colorLinea);
}

dibujarLineaUsuario($imagen, $x, $y, $x1, $y1);

//ultima linea siosi
header("Content-type:image/png");
imagepng($imagen);
imagedestroy($imagen);
?>
