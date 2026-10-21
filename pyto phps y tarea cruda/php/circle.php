<?php
//circulo
    function c1($imagen, $tam, $x_m, $y_m){
        // $tam=100;
        // $x_m=300;
        // $y_m=300;
        // $ang=0; 
        $color=imageColorAllocate($imagen,128,0,128);
        for ($ang=0; $ang <600; $ang++) { 
           
            $x=sin($ang)*$tam+$x_m;
            $y=cos($ang)*$tam+$y_m;
            imageline($imagen, $x, $y, $x, $y,$color);
        }
    }

    function c2($imagen, $tam, $x_m, $y_m){
        for ($i=0; $i < 3; $i++) { 
            $x_m=100;
            for ($j=0; $j < 5 ; $j++) {
                c1($imagen,$tam,$x_m,$y_m);
                $x_m=$x_m+100;
                }
            $y_m=$y_m+200;
        }
    }

    function c3($imagen, $tam){
        $x_m=50;
        $y_m=50;
        $x_m2=550;
        $y_m2=50;
        
        for ($i=0; $i < 8; $i++) { 
            c1($imagen,$tam,$x_m,$y_m);
            $x_m=$x_m+75;
            $y_m=$y_m+75;
        }

        for ($j=0; $j < 8 ; $j++) {
            c1($imagen,$tam,$x_m2,$y_m2);
            $x_m2=$x_m2-75;
            $y_m2=$y_m2+75;
        }
    }

    function c4($imagen, $tam){
        $x_m=300;
        $y_m=300;
        
        for ($i=0; $i < 5; $i++) { 
            c1($imagen,$tam,$x_m,$y_m);
            $tam=$tam+50;
        }
    }

    function c5($imagen, $tam){
        $x_m=50;
        $y_m=300;
        
        for ($i=0; $i < 4; $i++) { 
            c1($imagen,$tam,$x_m,$y_m);
            $tam=$tam+10;
            $x_m=$x_m+$tam*2;
        }
    }
        
    function c6($imagen, $tam, $x_m, $y_m){

        $color=imageColorAllocate($imagen,128,0,128);
        for ($ang=0; $ang <8; $ang++) { 
            // Usamos un tamaño más pequeño para los círculos del contorno
            $tam2 = 20;

            $x=sin($ang)*$tam+$x_m;
            $y=cos($ang)*$tam+$y_m;
            c1($imagen, $tam2, $x, $y);
        }
    }

    function c7($imagen, $tam, $x_m, $y_m){

        $color=imageColorAllocate($imagen,128,0,128);
        for ($ang=0; $ang <6S; $ang++) { 
            // Usamos un tamaño más pequeño para los círculos del contorno
            $tam2 = 40;

            $x=sin($ang)*$tam+$x_m;
            $y=cos($ang)*$tam+$y_m;
            c1($imagen, $tam2, $x, $y);
        }
    }

?>