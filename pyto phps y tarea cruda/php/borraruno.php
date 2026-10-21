<?php
include("validar.php"); 
include("bd.php");
if (!isset($_REQUEST["id"])){  
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
            <label> Ingrese Id: </label><br>
            <input type="number" name="id" placeholder="borrar alumno..."><br>
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
        $error="";
        $id=$_REQUEST["id"];
        $error=ValidarId($id, $error);
        if($error!=""){
            echo $error."<br>";
        }else{
            borraruno($id);
        }
    }
    ?>
</body>
</html>