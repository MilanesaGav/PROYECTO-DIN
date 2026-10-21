<?php
include("validar.php"); 
include("bd.php");
if (!isset($_REQUEST["nom"])){  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="p.css">
</head>
<body>
    <main>
        <form method="post" action="">
            <label> Ingrese Nombre: </label><br>
            <input type="text" name="nom" placeholder="Ingrese nombre.."><br>
            <label> Ingrese Correo: </label><br>
            <input type="text" name="correo" placeholder="Ingrese correo.."><br>
            <label>Ingrese edad: </label><br>
            <input type="number" name="edad" placeholder="Ingrese edad.. "><br>
            <input type="submit" name="enviar"><br>
        </form>
    </main>
</body>
</html>

<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
         
        $nombre=$_REQUEST["nom"];
        $mail=$_REQUEST["correo"];
        $edad=$_REQUEST["edad"];
        $error="";

        $error=ValidarNombre($nombre, $error);
        $error=ValidarCorreo($mail, $error);
        $error=ValidarEdad($edad, $error);
        if($error!=""){
            echo $error."<br>";
        }else{
            insertar($nombre,$edad,$mail);
        }
    }
    ?>
</body>
</html>