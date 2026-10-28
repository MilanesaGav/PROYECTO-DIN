<?php 
include("../9-archivos/CargarArchivo.php");
$nombre=$_REQUEST['nom'];
$edad=$_REQUEST['edad'];
$contra=$_REQUEST['contra'];

$servidor="localhost";
$usuario="root";
$pass="";
$base="dinamica";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");

// ============= GUARDA EL USUARIO EN LA BD =================
$sql= "insert into usuarios (nombre,edad,contrasenia) values ('$nombre',$edad,'$contra')" or die("Problemas en el insert".mysqli_error());
mysqli_query($conexion,$sql);

$idMovimiento = mysqli_insert_id($conexion);

mysqli_close($conexion);

// ============= GUARDA EL REGISTRO EN EL TXT =================

cargar($nombre,"registro");


?>