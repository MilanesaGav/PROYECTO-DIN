<?php
//hojas de funciones
// include("reng.php");
include("diseños.php");

//crea img con color )cddo)
$imagen = imageCreate(600,600);
imageColorAllocate($imagen,222,0,0);
imageinterlace($imagen,1);

//FUNCIONES PARA CREAR "LINEAS" (poner aca xd)

b($imagen,60,300,300);
//ultima linea siosi
ob_start();
imagepng($imagen);
$png = ob_get_clean();
imagedestroy($imagen);

$base64 = base64_encode($png);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        html, body {
            margin: 0;
            height: 100%;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }
        img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* se achica si el iframe es chico, sin deformarse */
        }
    </style>
</head>
<body>
    <img src="data:image/png;base64,<?= $base64 ?>" alt="Diseño 1">
</body>
</html>