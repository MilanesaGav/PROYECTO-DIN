<?php
include("bd.php");
include("validar.php");
if(!(isset($_REQUEST["id"]))){
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
            <input type="number" name="id" placeholder="Buscar alumno..."><br>
            <input type="submit" name="enviar"><br>
        </form>
    </main>
</body>
</html>
<?php }else{
    $id=$_REQUEST["id"];
    $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    $registros=mysqli_query($conexion,"SELECT * FROM alumnos where id=$id");  
?>
<!DOCTYPE html>
<html>
<head>
    MOSTRAR DATOS
    <link rel="stylesheet" href="p.css">
</head>
<body>
 
    <table border="1">    
        <tr>   
            <br>           
            <td>id</td>          
            <td>nombre</td>  
            <td>mail</td>
            <td>edad</td>          
        </tr>      

       <?php
       while($myrow=mysqli_fetch_array($registros)) {   
        //recorre de uno en uno los registros convirtiendo en vector cada registro
       ?>
        <tr>        
            <td><?php echo $myrow['id']?>            
            <td><?php echo $myrow['nombre']?></td>
            <td><?php echo $myrow['mail']?></td>
            <td><?php echo $myrow["edad"]?></td>      
        </tr>
       <?php    
        }      
        ?>
    </table>

    </body>
</html>
<?php } ?>