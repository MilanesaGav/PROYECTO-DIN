<?php
// Recibimos los datos enviados en formato JSON desde JavaScript
$contenidoJSON = file_get_contents('php://input');
$datos = json_decode($contenidoJSON, true);

if ($datos) {
    $colorPrimario = $datos['c1'];
    $colorSecundario = $datos['c2'];

    // Aquí haces lo que quieras con los colores:
    // Por ejemplo, guardarlos en una base de datos o sesión:
    // $_SESSION['color1'] = $colorPrimario;

    echo "Los colores recibidos fueron: $colorPrimario y $colorSecundario";
} else {
    http_response_code(400);
    echo "No se recibieron datos.";
}
?>