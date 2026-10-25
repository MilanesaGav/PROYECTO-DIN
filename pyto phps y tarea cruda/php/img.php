<?php
//hojas de funciones
// include("reng.php");
include("figuras.php");

//crea img con color )cddo)
$imagen = imageCreate(600,600);imageColorAllocate($imagen,222,0,0);
imageinterlace($imagen,1);

//FUNCIONES PARA CREAR "LINEAS" (poner aca xd)

c7($imagen,60,300,300);
//ultima linea siosi
header("Content-type:image/png");
imagepng($imagen);
imagedestroy($imagen);
?>
