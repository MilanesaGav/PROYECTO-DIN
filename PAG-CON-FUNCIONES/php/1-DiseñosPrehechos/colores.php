<?php
session_start(); // Iniciamos sesión para guardar los datos

$contenidoJSON = file_get_contents('php://input');
$datos = json_decode($contenidoJSON, true);

if ($datos) {
    $hexFondo = $datos['c1']; // Viene como "#ff0000"
    $hexLinea = $datos['c2']; // Viene como "#00ff00"

    // Función para convertir Hex a RGB (lo que necesita PHP GD)
    function hexToRgb($hex) {
        $hex = ltrim($hex, '#');
        return [
            hexdec(substr($hex, 0, 2)), // Rojo
            hexdec(substr($hex, 2, 2)), // Verde
            hexdec(substr($hex, 4, 2))  // Azul
        ];
    }

    // Guardamos los valores convertidos en la sesión
    $_SESSION['rgbFondo'] = hexToRgb($hexFondo);
    $_SESSION['rgbLinea'] = hexToRgb($hexLinea);

    echo "Colores guardados en sesión con éxito";
} else {
    http_response_code(400);
    echo "No se recibieron datos.";
}
?>