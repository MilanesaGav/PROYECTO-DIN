<?php 
include("../9-archivos/CargarArchivo.php");
$nombre=$_REQUEST['nom'];
$contra=$_REQUEST['contra'];

$servidor="localhost";
$usuario="root";
$pass="";
$base="dinamica";
$conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");


// ============= GUARDA EL REGISTRO EN EL TXT =================

cargar($nombre,"inicio de sesión");


?>