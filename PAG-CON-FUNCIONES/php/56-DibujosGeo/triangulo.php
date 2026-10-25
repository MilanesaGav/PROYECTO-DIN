<?php
// Función 1: Dibuja un triángulo base centrado en ($x_m, $y_m)
function tri1($imagen, $tam, $x_m, $y_m) {
    $color = imageColorAllocate($imagen, 128, 0, 128);
    $puntos = array(
        $x_m, $y_m - $tam,         // Vértice Superior
        $x_m + $tam, $y_m + $tam,  // Vértice Inferior Derecho
        $x_m - $tam, $y_m + $tam   // Vértice Inferior Izquierdo
    );
    imagepolygon($imagen, $puntos, 3, $color);
}

// Función 2: Grilla de triángulos centrada con espacios
function tri2($imagen, $tam, $x_m, $y_m) {
    $espacio = 20;
    $ancho_total_figura = ($tam * 2) + $espacio;
    $ancho_grilla = (3 * $ancho_total_figura) - $espacio;
    $salto_grilla = (3 * $ancho_total_figura) - $espacio;

    $x_inicio = (imagesx($imagen) - $ancho_grilla) / 2 + $tam;
    $y_inicio = (imagesy($imagen) - $salto_grilla) / 2 + $tam;

    for ($i = 0; $i < 3; $i++) {
        $y_actual = $y_inicio + ($i * $ancho_total_figura);
        for ($j = 0; $j < 3; $j++) {
            $x_actual = $x_inicio + ($j * $ancho_total_figura);
            tri1($imagen, $tam, $x_actual, $y_actual);
        }
    }
}

// Función 3: Diagonales simétricas de triángulos centradas en forma de X
function tri3($imagen, $tam) {
    $espacio = 20;
    $paso = ($tam * 2) + $espacio;
    $ancho = imagesx($imagen);
    $alto = imagesy($imagen);

    $x_centro = $ancho / 2;
    $y_centro = $alto / 2;

    for ($i = 0; $i < 8; $i++) {
        $x_m = $x_centro - (3.5 * $paso) + ($i * $paso);
        $y_m = $y_centro - (3.5 * $paso) + ($i * $paso);
        tri1($imagen, $tam, $x_m, $y_m);
    }

    for ($j = 0; $j < 8; $j++) {
        $x_m = $x_centro - (3.5 * $paso) + ($j * $paso);
        $y_m = $y_centro + (3.5 * $paso) - ($j * $paso);
        tri1($imagen, $tam, $x_m, $y_m);
    }
}

// Función 4: Triángulos concéntricos (creciendo desde el centro)
function tri4($imagen, $tam) {
    $x_m = 300;
    $y_m = 300;
    for ($i = 0; $i < 5; $i++) {
        tri1($imagen, $tam, $x_m, $y_m);
        $tam = $tam + 40;
    }
}

// Función 5: Triángulos en fila horizontal con crecimiento y espacio
function tri5($imagen, $tam) {
    $x_m = 80;
    $y_m = 300;
    for ($i = 0; $i < 4; $i++) {
        tri1($imagen, $tam, $x_m, $y_m);
        $tam = $tam + 5;
        $x_m = $x_m + ($tam * 2) + 10;
    }
}

// Función 6: Triángulos distribuidos formando la silueta de un rombo
function tri6($imagen, $tam, $x_m, $y_m) {
    $tam_pequeno = 18;
    $radio = 140;
    $stop_x = $x_m; $stop_y = $y_m - $radio;
    $sright_x = $x_m + $radio; $sright_y = $y_m;
    $sbottom_x = $x_m; $sbottom_y = $y_m + $radio;
    $sleft_x = $x_m - $radio; $sleft_y = $y_m;
    $por_lado = 3;

    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $stop_x + ($sright_x - $stop_x) * $st, $stop_y + ($sright_y - $stop_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sright_x + ($sbottom_x - $sright_x) * $st, $sright_y + ($sbottom_y - $sright_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sbottom_x + ($sleft_x - $sbottom_x) * $st, $sbottom_y + ($sleft_y - $sbottom_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sleft_x + ($stop_x - $sleft_x) * $st, $sleft_y + ($stop_y - $sleft_y) * $st);
    }
}

// Función 7: Otra variante de rombo con triángulos distribuidos simétricamente
function tri7($imagen, $tam, $x_m, $y_m) {
    $tam_pequeno = 25;
    $radio = 110;
    $stop_x = $x_m; $stop_y = $y_m - $radio;
    $sright_x = $x_m + $radio; $sright_y = $y_m;
    $sbottom_x = $x_m; $sbottom_y = $y_m + $radio;
    $sleft_x = $x_m - $radio; $sleft_y = $y_m;
    $por_lado = 2;

    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $stop_x + ($sright_x - $stop_x) * $st, $stop_y + ($sright_y - $stop_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sright_x + ($sbottom_x - $sright_x) * $st, $sright_y + ($sbottom_y - $sright_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sbottom_x + ($sleft_x - $sbottom_x) * $st, $sbottom_y + ($sleft_y - $sbottom_y) * $st);
    }
    for ($i = 0; $i < $por_lado; $i++) {
        $st = ($i + 0.5) / $por_lado;
        tri1($imagen, $tam_pequeno, $sleft_x + ($stop_x - $sleft_x) * $st, $sleft_y + ($stop_y - $sleft_y) * $st);
    }
}
?>