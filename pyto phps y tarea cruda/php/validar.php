<?php 
    function ValidarNombre($nombre, $error){
        if(empty($nombre)){
            $error=$error."<p>Ingrese nombre valido!!</p>";
        }
        return $error;
    }

    function ValidarCorreo($correo, $error){
        if(empty($correo)){
            $error=$error."<p>Ingrese correo!!</p>";
        }
        return $error;
    }

    function ValidarEdad($edad, $error){
        if(empty($edad)){
            $error =$error."<p>Ingrese edad!! </p>";
        }
        return $error;
    }

    function ValidarId($id, $error){
        if(empty($id)){
            $error=$error."<p>Ingrese id!! </p>";
        }
        return $error;
    }
?>