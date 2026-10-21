<?php
include("validar.php"); 
include("bd.php");
session_start();
if (!isset($_SESSION["IDcuenta"])){
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
            <label> Ingrese su id: </label><br>
            <input type="number" name="id" placeholder="Ingrese id.."><br>
            <input type="submit" name="enviar"><br>
        </form>
    </main>
</body>
</html>

<?php 
    }else{  
        $id=$_REQUEST["id"];
        $error="";
        $error=ValidarId($id, $error);
        if($error!=""){
            echo $error."<br>";
        }else{
            buscar($id);
        }
    }
    ?>
</body>
</html>
<?php 
    }else{
        echo "<h1> Hola ".$_SESSION["NOMcuenta"].", Id nro: ".$_SESSION["IDcuenta"]."!!!";
    }//mostrar datsos?>


