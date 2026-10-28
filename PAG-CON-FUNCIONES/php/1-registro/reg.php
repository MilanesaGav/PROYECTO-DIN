<?php 

$nombre=$_REQUEST['nom'];
$edad=$_REQUEST['edad'];
$contra=$_REQUEST['contra'];

$servidor="localhost";
$usuario="root";
$pass="";
$base="dinamica";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");

$sql= "insert into usuarios (nombre,edad,contrasenia) values ('$nombre',$edad,'$contra')" or die("Problemas en el insert".mysqli_error());
mysqli_query($conexion,$sql);

mysqli_close($conexion);

?>