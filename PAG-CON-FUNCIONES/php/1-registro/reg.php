<?php 

$nombre=$_REQUEST['nom'];
$contra=$_REQUEST['contra'];

$servidor="localhost";
$usuario="root";
$pass="";
$base="escuela";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");

$sql= "insert into alumno usuarios ($nombre,$contra)" or die("Problemas en el insert".mysqli_error());
mysqli_query($conexion,$sql);

mysqli_close($conexion);

echo "el alumno pudo inscribirse";
?>