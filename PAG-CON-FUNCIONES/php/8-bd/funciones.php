<?php
$servidor="sql110.ezyro.com";
$usuario="ezyro_43324187";
$pass="bfe7d372d2";
$base="ezyro_43324187_dinamica";

//FUNCIONES

function borraruno($id){
    global $servidor, $usuario, $pass, $base; // <-- ¡Esto es lo que falta!
    $conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");
    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    
    mysqli_query($conexion, $sql);
    $filas_afectadas = mysqli_affected_rows($conexion);
    
    mysqli_close($conexion);
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
        <style>
            body {
                background-color: #ffffff;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .mensaje {
                padding: 20px 30px;
                border-radius: 10px;
                font-size: 1.1rem;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                text-align: center;
            }
            .exito {
                background-color: #f0fdf4;
                color: #16a34a;
                border: 1px solid #bbf7d0;
            }
            .error {
                background-color: #fef2f2;
                color: #dc2626;
                border: 1px solid #fecaca;
            }
        </style>
    </head>
    <body>

        <?php if ($filas_afectadas > 0) { ?>
            <div class="mensaje exito">Registro eliminado correctamente.</div>
        <?php } else { ?>
            <div class="mensaje error">No se encuentra ese usuario en la base de datos.</div>
        <?php } ?>

    </body>
    </html>
<?php 
} 

function buscar($id){
    global $servidor, $usuario, $pass, $base; // <-- Acá también
    $conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");
    $registros=mysqli_query($conexion,"SELECT * FROM usuarios where id=$id");  
?>
        <!DOCTYPE html>
        <html>
        <head>
             <link rel="stylesheet" href="../../styles/style8.css">
        </head>
        <body>

            <table border="1">    
                <tr>   
                    <br>           
                    <td class="violeta">id</td>          
                    <td class="violeta">nombre</td>  
                    <td class="violeta">mail</td>     
                </tr>      

               <?php
               while($myrow=mysqli_fetch_array($registros)) {   
               ?>
                <tr>        
                    <td><?php echo $myrow['id']?></td> <!-- Ojo acá que te faltaba cerrar el </td> -->
                    <td><?php echo $myrow['nombre']?></td>
                    <td><?php echo $myrow['mail']?></td> 
                </tr>
               <?php    
                }      
                ?>
            </table>

            </body>
        </html>
<?php } ?>  

<?php
function mostrar(){
    global $servidor, $usuario, $pass, $base; // <-- Y acá también
    $conexion=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas en la conexion");
    $registros=mysqli_query($conexion,"SELECT * FROM usuarios");  
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="../../styles/style8.css">
        <link rel="stylesheet" href="../../styles/style9.css">
    </head>
    <body>
    
        <table border="1">    
            <tr>   
                <br>           
                <td class="violeta">id</td>          
                <td class="violeta">nombre</td>  
                <td class="violeta">mail</td>       
            </tr>      

           <?php
           while($myrow=mysqli_fetch_array($registros)) {   
           ?>
            <tr>        
                <td><?php echo $myrow['id']?></td> <!-- Cuidado con cerrar bien las etiquetas -->
                <td><?php echo $myrow['nombre']?></td>
                <td><?php echo $myrow['mail']?></td>    
            </tr>
           <?php    
            }      
            ?>
        </table>

        </body>
    </html>
    <?php 
} ?>