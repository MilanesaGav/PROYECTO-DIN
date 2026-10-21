<?php
include("validar.php"); 
include("bd.php");
if(!(isset($_REQUEST["bt"]))){
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
            <label> ¿Seguro que quiere borrar todo?: </label><br>
            <input type="number" name="bt" placeholder="Ingrese 12345">
            <input type="submit" name="enviar"><br>
        </form>
    </main>
</body>
</html>
<?php }else{
    $contra=$_REQUEST["bt"];
    if(12345 == $contra){
        borrartd();
    }else{
        echo "contraseña erronea, no se borro nada";
    }
 } 
 ?>