<?php 
include("../9-archivos/CargarArchivo.php");
$nombre=$_REQUEST['nom'];
$mail=$_REQUEST['mail'];
$contra=$_REQUEST['contra'];

$servidor="sql110.ezyro.com";
$usuario="ezyro_43324187";
$pass="bfe7d372d2";
$base="ezyro_43324187_dinamica";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");

// ============= GUARDA EL USUARIO EN LA BD =================
$sql= "insert into usuarios (nombre,mail,contrasenia) values ('$nombre','$mail','$contra')" or die("Problemas en el insert".mysqli_error());
mysqli_query($conexion,$sql);

$idMovimiento = mysqli_insert_id($conexion);

mysqli_close($conexion);

// ============= GUARDA EL REGISTRO EN EL TXT =================

cargar($nombre,$mail,"registro");


?>