<?php 
include("../9-archivos/CargarArchivo.php");
$mail=$_REQUEST['mail'];
$contra=$_REQUEST['contra'];

$servidor="localhost";
$usuario="root";
$pass="";
$base="dinamica";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");

//busca el usuario con el mail y contraseña exactos:
$sql="select * from usuarios where mail='$mail' and contrasenia='$contra'";
$registros=mysqli_query($conexion,$sql);

if($reg=mysqli_fetch_array($registros)){
    cargar($reg['nombre'],$reg['mail'],"inicio de sesión");
}else{
    echo '<script>
            alert("No se encontró el usuario o la contraseña es incorrecta");
            window.history.back();
          </script>' ;
};





?>