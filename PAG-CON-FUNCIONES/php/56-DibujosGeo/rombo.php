<?php
// Función 1: Dibuja un rombo base
function rombo1($imagen, $tam, $x_m, $y_m) {
    $color = imageColorAllocate($imagen, 128, 0, 128);
    $puntos = array(
        $x_m, $y_m - $tam, // Vértice Superior
        $x_m + $tam, $y_m, // Vértice Derecho
        $x_m, $y_m + $tam, // Vértice Inferior
        $x_m - $tam, $y_m  // Vértice Izquierdo
    );
    imagepolygon($imagen, $puntos, 4, $color);
}

// Función 2: Grilla de rombos centrada con espacios
function rombo2($imagen, $tam, $x_m, $y_m) {
    $espacio = 20;
    $ancho_total_figura = ($tam * 2) + $espacio;
    $ancho_grilla = (3 * $ancho_total_figura) - $espacio;
    $salto_grilla = (3 * $ancho_total_figura) - $espacio;

    $x_inicio = (imagesx($imagen) - $ancho_grilla) / 2 - $tam;
    $y_inicio = (imagesy($imagen) - $salto_grilla) / 2 + $tam;

    for ($i = 0; $i < 3; $i++) {
        $y_actual = $y_inicio + ($i * $ancho_total_figura);
        for ($j = 0; $j < 3; $j++) {
            $x_actual = $x_inicio + ($j * $ancho_total_figura);
            rombo1($imagen, $tam, $x_actual, $y_actual);
        }
    }
}

// Función 3: Diagonales simétricas de rombos centradas en forma de X
function rombo3($imagen, $tam) {
    $espacio = 20;
    $paso = ($tam * 2) + $espacio;
    $ancho = imagesx($imagen);
    $alto = imagesy($imagen);

    $x_centro = $ancho / 2;
    $y_centro = $alto / 2;

    for ($i = 0; $i < 8; $i++) {
        $x_m = $x_centro - (3.5 * $paso) + ($i * $paso);
        $y_m = $y_centro - (3.5 * $paso) + ($i * $paso);
        rombo1($imagen, $tam, $x_m, $y_m);
    }

    for ($j = 0; $j < 8; $j++) {
        $x_m = $x_centro - (3.5 * $paso) + ($j * $paso);
        $y_m = $y_centro + (3.5 * $paso) - ($j * $paso);
        rombo1($imagen, $tam, $x_m, $y_m);
    }
}

// Función 4: Rombos concéntricos (creciendo desde el centro)
function rombo4($imagen, $tam) {
    $x_m = 300;
    $y_m = 300;
    for ($i = 0; $i < 5; $i++) {
        rombo1($imagen, $tam, $x_m, $y_m);
        $tam = $tam + 40;
    }
}

// Función 5: Rombos en fila horizontal con crecimiento y espacio
function rombo5($imagen, $tam) {
    $x_m = 80;
    $y_m = 300;
    for ($i = 0; $i < 4; $i++) {
        rombo1($imagen, $tam, $x_m, $y_m);
        $tam = $tam + 5;
        $x_m = $x_m + ($tam * 2) + 10;
    }
}

// Función 6: Anillo de rombos pequeños alrededor de un punto
function rombo6($imagen, $tam, $x_m, $y_m) {
    $tam_rombo_pequeno = 20;
    $radio = $tam;
    $top_x = $x_m; $top_y = $y_m - $radio;
    $right_x = $x_m + $radio; $right_y = $y_m;
    $bottom_x = $x_m; $bottom_y = $y_m + $radio;
    $left_x = $x_m - $radio; $left_y = $y_m;

    $por_lado = 2;
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        $x = $top_x + ($right_x - $top_x) * $st;
        $y = $top_y + ($right_y - $top_y) * $st;
        rombo1($imagen, $tam_rombo_pequeno, $x, $y);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        $x = $right_x + ($bottom_x - $right_x) * $st;
        $y = $right_y + ($bottom_y - $right_y) * $st;
        rombo1($imagen, $tam_rombo_pequeno, $x, $y);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        $x = $bottom_x + ($left_x - $bottom_x) * $st;
        $y = $bottom_y + ($left_y - $bottom_y) * $st;
        rombo1($imagen, $tam_rombo_pequeno, $x, $y);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        $x = $left_x + ($top_x - $left_x) * $st;
        $y = $left_y + ($top_y - $left_y) * $st;
        rombo1($imagen, $tam_rombo_pequeno, $x, $y);
    }
}

// Función 7: Rombos distribuidos formando un perímetro cuadrado simétrico y con espacio
function rombo7($imagen, $tam, $x_m, $y_m) {
    $tam_rombo = 25;
    $espacio = 20;
    $lado = ($tam * 2) + 40;
    $elementos_por_lado = 4;
    $paso = $lado / $elementos_por_lado;
    $inicio_x = $x_m - ($lado / 2);
    $inicio_y = $y_m - ($lado / 2);

    for ($i = 0; $i < $elementos_por_lado; $i++) {
        $pos = $i * $paso + ($paso / 2);
        rombo1($imagen, $tam_rombo, $inicio_x + $pos, $inicio_y - $espacio);
        rombo1($imagen, $tam_rombo, $inicio_x + $pos, $inicio_y + $lado - $espacio);
        rombo1($imagen, $tam_rombo, $inicio_x - $espacio, $inicio_y + $pos);
        rombo1($imagen, $tam_rombo, $inicio_x + $lado + $espacio, $inicio_y + $pos);
    }
}
?>