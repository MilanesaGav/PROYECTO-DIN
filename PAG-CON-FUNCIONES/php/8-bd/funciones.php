<?php
//dejo los datos de la bd arriba para usarlos de manera global
// $servidor="localhost"; $usuario="root"; $pass=""; $base="bd";
define('SRV', 'localhost');
define('USER', 'root');
define("PASS","");
define("BASE","bd");
// ahi tamos definiendo variables globales, eso mediante CONSTANTES (como en js)
//para acceder a esas ctes/vars glob hay q poner => (sin $) NOMBRECTE

//FUNCIONES
function insertar($nom,$edad,$mail){
    $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    $sql= "insert into alumnos  values (0 , '$nom' , '$mail', $edad  )" or die("Problemas en el select".mysqli_error());
    mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    echo "el alumno pudo inscribirse";
}

function borraruno($id){
    $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    $sql="delete from alumnos where id='$id'";
    if (mysqli_query($conexion  , $sql)) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar ";
    }
    mysqli_close($conexion);
}

    //igualmente no sirve para q avise si no hay un user con ese id, 
    // solo avisa si hay un error de sintaxis sql

    //--- PROFE---
    // $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    // $sql = "DELETE FROM alumnos WHERE id = $id";
    // if (mysqli_query($conexion  , $sql)) {
    //     echo "Registro eliminado correctamente.";
    // } else {
    //     echo "Error al eliminar ";
    // }
    // mysqli_close($conexion  );

    //--- EL Q HABIA HECHO YO ---
    // $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    // $sql="delete from alumnos where id='$id'";
    // mysqli_query($conexion,$sql);
    // mysqli_close($conexion);
    // echo "se borró al alumno correctamente";

    function borrartd(){
        $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
        $sql="delete from alumnos"; //para borrar todo
        mysqli_query($conexion,$sql);
        mysqli_close($conexion);
        echo "se borro todo";
    }

    function buscar($id){
        $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
        $sql="select * from alumnos where id='$id'"; //para buscar alumno por id
        $registros = mysqli_query($conexion, $sql) or die("Problemas en el select " . mysqli_error($conexion));
        // guarda el query en la variable registros

        if ($reg = mysqli_fetch_array($registros)) {
        // hace un array/vector con los datos del registro, si existe guarda en session,
        //sino le dice q no encontro
        $_SESSION["IDcuenta"] = $reg['id'];
        $_SESSION["NOMcuenta"] = $reg['nombre']; // O la columna que tengan en la BD (ej: nombre)
            echo "Se guardó tu id";
        }else{
        echo "no se encontro tu id";
        }

        mysqli_close($conexion);
    }

?>