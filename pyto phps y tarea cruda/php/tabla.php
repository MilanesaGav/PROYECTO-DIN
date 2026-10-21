<?php
include("bd.php");
$conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
$registros=mysqli_query($conexion,"SELECT * FROM alumnos");  
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