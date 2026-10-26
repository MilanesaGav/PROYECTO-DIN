<?php
include("funciones.php");

// Verificamos qué acción pidió el usuario
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    switch ($accion) {
        // --- 1. MOSTRAR FORMULARIO DE BÚSQUEDA ---
        case 'form_buscar':
            ?>
            <h3>Buscar Alumno por ID</h3>
            <form action="../php/8-bd/intermedio.php?accion=procesar_buscar" method="POST">
                <label for="id">Ingresa el ID:</label>
                <input type="number" name="id" required>
                <button type="submit">Buscar</button>
            </form>
            <?php
            break;

        // --- 2. PROCESAR LA BÚSQUEDA ---
        case 'procesar_buscar':
            if (isset($_POST['id'])) {
                buscar($_POST['id']); // Llama a tu función de funciones.php
            }
            break;

        // --- 3. MOSTRAR FORMULARIO DE BORRAR ---
        case 'form_borrar':
            ?>
            <h3>Borrar Alumno por ID</h3>
            <form action="../php/8-bd/intermedio.php?accion=procesar_borrar" method="POST">
                <label for="id">ID a borrar:</label>
                <input type="number" name="id" required>
                <button type="submit" style="background-color: red; color: white;">Borrar</button>
            </form>
            <?php
            break;

        // --- 4. PROCESAR EL BORRADO ---
        case 'procesar_borrar':
            if (isset($_POST['id'])) {
                borraruno($_POST['id']); // Llama a tu función
            }
            break;

        case 'procesar_mostrar':
            $conexion = mysqli_connect(SRV, USER, PASS, BASE) or die("Problemas en la conexion");
            $registros = mysqli_query($conexion, "SELECT * FROM alumnos");  
            ?>
            <h3>Lista de Alumnos</h3>
            <table border="1">    
                <tr>           
                    <td>id</td>          
                    <td>nombre</td>  
                    <td>mail</td>
                    <td>edad</td>          
                </tr>      
               <?php
               while ($myrow = mysqli_fetch_array($registros)) {   
               ?>
                <tr>        
                    <td><?php echo $myrow['id']; ?></td>            
                    <td><?php echo $myrow['nombre']; ?></td>
                    <td><?php echo $myrow['mail']; ?></td>
                    <td><?php echo $myrow["edad"]; ?></td>      
                </tr>
               <?php    
                }      
                ?>
            </table>
            <?php
            mysqli_close($conexion);
            break;

        default:
            echo "Selecciona una opción del menú.";
            break;
    }
} else {
    echo "Bienvenido. Haz clic en una opción de la izquierda.";
}
?>