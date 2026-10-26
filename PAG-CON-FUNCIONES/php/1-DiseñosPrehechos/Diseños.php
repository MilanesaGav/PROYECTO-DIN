<?php
function a($imagen,$rgbLinea){
    $x=0;
    $y=0;
    $x1=600;
    $y1=0;
    for($i=0;$i<60;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]); //COLOR DE LINEA
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $x=$x;
        $y=$y+25;
        $y1=$y1+25;
    }
}

function b($imagen,$rgbLinea){
    $x=0;
    $y=0;
    $x1=0;
    $y1=600;
    for($i=0;$i<60;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]);
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $x=$x+25;
        $y=$y;
        $x1=$x1+25;
    }
}

function c($imagen,$rgbLinea){
    $x=0;
    $y=0;
    $x1=600;
    $y1=-600;
    for($i=0;$i<120;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]);
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $y1=$y1+25;
        $y=$y+25;
    }
}

function d($imagen,$rgbLinea){
    $x=0;
    $y=-600;
    $x1=600;
    $y1=0;
    for($i=0;$i<120;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]);
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $y1=$y1+25;
        $y=$y+25;
    }
}

function e($imagen,$rgbLinea){
    $x=0;
    $y=600;
    $x1=600;
    $y1=585;
    for($i=0;$i<120;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]);
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $x=$x+50;
        $y1=$y1-50;
    }
}

function f($imagen,$rgbLinea){
    $x=0;
    $y=0;
    $x1=10;
    $y1=600;
    for($i=0;$i<120;$i++){
        $color=imageColorAllocate($imagen,$rgbLinea[0], $rgbLinea[1], $rgbLinea[2]);
        imageline($imagen, $x,$y,$x1,$y1,$color);
        $x1=$x1+50;
        $y=$y+50;
    }
}

?>