<?php
//hojas de funciones
// include("reng.php");
session_start();
include("diseños.php");

// Si ya existen en la sesión, los usamos. Si no, ponemos uno por defecto.
$rgbFondo = isset($_SESSION['rgbFondo']) ? $_SESSION['rgbFondo'] : [222, 0, 0];
$rgbLinea = isset($_SESSION['rgbLinea']) ? $_SESSION['rgbLinea'] : [128, 0, 128];

//crea img con color )cddo)
$imagen = imageCreate(600,600);
imageColorAllocate($imagen, $rgbFondo[0], $rgbFondo[1], $rgbFondo[2]); //color de fondo
imageinterlace($imagen,1);

//FUNCIONES PARA CREAR "LINEAS" (poner aca xd)

d($imagen, $rgbLinea);
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