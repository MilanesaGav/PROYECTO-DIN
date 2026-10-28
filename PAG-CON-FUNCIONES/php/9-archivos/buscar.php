<?php
$FechaRecibida=$_REQUEST['fecha'];
$mail=$_REQUEST['mail'];
include("funcionesArch.php");
buscar($FechaRecibida,$mail)

?>