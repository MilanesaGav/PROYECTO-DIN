<?php
// Función 1: Dibuja un cuadrado base
function cul($imagen, $tam, $x_m, $y_m, $color) {
    imagerectangle($imagen, $x_m - $tam, $y_m - $tam, $x_m + $tam, $y_m + $tam, $color);
}

// Función 2: Grilla de cuadrados centrada con espacios
// Función 2: Grilla de cuadrados centrada con espacios
function cu2($imagen, $tam, $x_m, $y_m, $color) {
    $espacio = 15;
    $ancho_total_figura = ($tam * 2) + $espacio;
    $ancho_grilla = (3 * $ancho_total_figura) - $espacio;
    $salto_grilla = (3 * $ancho_total_figura) - $espacio;

    $x_inicio = (imagesx($imagen) - $ancho_grilla) / 2 + $tam;
    $y_inicio = (imagesy($imagen) - $salto_grilla) / 2 + $tam;

    for ($i = 0; $i < 3; $i++) {
        $y_actual = $y_inicio + ($i * $ancho_total_figura);
        for ($j = 0; $j < 3; $j++) {
            $x_actual = $x_inicio + ($j * $ancho_total_figura);
            cul($imagen, $tam, $x_actual, $y_actual, $color); // <-- Ojo: asegurate de pasarle el $color aquí también
        }
    }
}

// Función 3: Diagonales simétricas centradas en forma de X
function cu3($imagen, $tam, $color) {
    $espacio = 15;
    $paso = ($tam * 2) + $espacio;
    $ancho = imagesx($imagen);
    $alto = imagesy($imagen);

    $x_centro = $ancho / 2;
    $y_centro = $alto / 2;

    for ($i = 0; $i < 8; $i++) {
        $x_m = $x_centro + (-3.5 * $paso) + ($i * $paso);
        $y_m = $y_centro + (-3.5 * $paso) + ($i * $paso);
        cul($imagen, $tam, $x_m, $y_m, $color);
    }

    for ($j = 0; $j < 8; $j++) {
        $x_m = $x_centro + (-3.5 * $paso) + ($j * $paso);
        $y_m = $y_centro + (3.5 * $paso) - ($j * $paso);
        cul($imagen, $tam, $x_m, $y_m, $color);
    }
}

// Función 4: Cuadrados concéntricos (creciendo desde el centro)
function c4($imagen, $tam, $color) {
    $x_m = 300;
    $y_m = 300;
    for ($i = 0; $i < 5; $i++) {
        cul($imagen, $tam, $x_m, $y_m, $color);
        $tam = $tam + 50;
    }
}

// Función 5: Cuadrados en fila horizontal con crecimiento y espacio
function c5($imagen, $tam, $color) {
    $x_m = 50;
    $y_m = 300;
    for ($i = 0; $i < 4; $i++) {
        cul($imagen, $tam, $x_m, $y_m, $color);
        $tam = $tam + 5;
        $x_m = $x_m + ($tam * 2) + 10;
    }
}

// Función 6: Anillo de cuadrados distribuidos en circunferencia (8 elementos)
function c6($imagen, $tam, $x_m, $y_m, $color) {
    $cantidad = 8;
    for ($ang = 0; $ang < $cantidad; $ang++) {
        $tam2 = 20; 
        $angulo_rad = ($ang * 2 * M_PI) / $cantidad;
        $x = sin($angulo_rad) * $tam + $x_m;
        $y = cos($angulo_rad) * $tam + $y_m;
        cul($imagen, $tam2, $x, $y, $color);
    }
}

// Función 7: Perímetro de cuadrados
function c7($imagen, $tam, $x_m, $y_m, $color) {
    $tam2 = 40;
    $espacio = 20;
    $lado = ($tam * 2);
    $elementos_por_lado = 4;
    $paso = $lado / $elementos_por_lado;
    $inicio_x = $x_m - $tam;
    $inicio_y = $y_m - $tam;

    for ($i = 0; $i < $elementos_por_lado; $i++) {
        $pos = $i * $paso + ($paso / 2);
        cul($imagen, $tam2, $inicio_x + $pos, $inicio_y - $espacio, $color);
        cul($imagen, $tam2, $inicio_x + $pos, $inicio_y + $lado + $espacio, $color);
        cul($imagen, $tam2, $inicio_x - $espacio, $inicio_y + $pos, $color);
        cul($imagen, $tam2, $inicio_x + $lado + $espacio, $inicio_y + $pos, $color);
    }
}
?>