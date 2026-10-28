<?php 
//esta funcion se usa en reg.php y en login.php

function cargar($nombre,$mail,$categoria){
    $hoy = date("d-m-y");// 27-10-26

    $archivo=fopen("../../archivo/movimientos.txt","a");
    fwrite($archivo,"$nombre|$mail|$categoria|$hoy \n");
    fclose($archivo);
    // ============= REDIRIJE AL MENU PRINCIPAL =================
    header("Location: ../../templates/3-MenuPrincipal.html"); //redirije a donde yo le diga
}

?>