<?php
//dejo los datos de la bd arriba para usarlos de manera global
// $servidor="localhost"; $usuario="root"; $pass=""; $base="bd";
define('SRV', 'localhost');
define('USER', 'root');
define("PASS","");
define("BASE","dinamica");
// ahi tamos definiendo variables globales, eso mediante CONSTANTES (como en js)
//para acceder a esas ctes/vars glob hay q poner => (sin $) NOMBRECTE

//FUNCIONES
function insertar($nom,$edad,$mail){
    $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    $sql= "insert into alumnos  values (0 , '$nom' , '$mail', $edad  )" or die("Problemas en el select".mysqli_error());
    mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    echo "el alumno pudo inscribirse";
}

function borraruno($id){
    $conexion = mysqli_connect(SRV, USER, PASS, BASE) or die("Problemas en la conexion");
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


    //igualmente no sirve para q avise si no hay un user con ese id, 
    // solo avisa si hay un error de sintaxis sql

    //--- PROFE---
    // $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    // $sql = "DELETE FROM alumnos WHERE id = $id";
    // if (mysqli_query($conexion  , $sql)) {
    //     echo "Registro eliminado correctamente.";
    // } else {
    //     echo "Error al eliminar ";
    // }
    // mysqli_close($conexion  );

    //--- EL Q HABIA HECHO YO ---
    // $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
    // $sql="delete from alumnos where id='$id'";
    // mysqli_query($conexion,$sql);
    // mysqli_close($conexion);
    // echo "se borró al alumno correctamente";

    function borrartd(){
        $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
        $sql="delete from alumnos"; //para borrar todo
        mysqli_query($conexion,$sql);
        mysqli_close($conexion);
        echo "se borro todo";
    }

    function buscar($id){
        $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
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
                //recorre de uno en uno los registros convirtiendo en vector cada registro
               ?>
                <tr>        
                    <td><?php echo $myrow['id']?>            
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
    $conexion=mysqli_connect(SRV,USER,PASS,BASE) or die("Problemas en la conexion");
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
            //recorre de uno en uno los registros convirtiendo en vector cada registro
           ?>
            <tr>        
                <td><?php echo $myrow['id']?>            
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