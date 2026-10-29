
<?php
function tabla() {
    
    $archivo = "../../archivo/movimientos.txt";
    if (!file_exists($archivo)) {
        echo "<p>El archivo datos.txt aún no existe.</p>";
        return;
    }
    
    $archi = fopen($archivo, "r") or die("Error al abrir el archivo");
    echo '<table border="1" style="border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f2f2f2;">              
                <th class="violeta";">Nombre</th>  
                <th class="violeta";">Correo</th>
                <th class="violeta";">Categoria</th>          
                <th class="violeta";">Fecha</th>                 
            </tr>';      

    while (($linea = fgets($archi)) !== false) {
        $linea = trim($linea);
        if (empty($linea)) {
            continue;
        }
        $campos = explode("|", $linea);
        echo "<tr>";        
        echo "<td style='padding: 8px;'>" . ($campos[0] ?? '') . "</td>";            
        echo "<td style='padding: 8px;'>" . ($campos[1] ?? '') . "</td>";
        echo "<td style='padding: 8px;'>" . ($campos[2] ?? '') . "</td>";
        echo "<td style='padding: 8px;'>" . ($campos[3] ?? '') . "</td>";           
        echo "</tr>";
    }      
    fclose($archi);
    echo '</table>';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <style>
        /* Estilos generales para el resultado dentro del iframe */
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Estilos para el cuadro de mensaje */
        .mensaje {
            padding: 20px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 400px;
        }

        /* Estilo para cuando se borra correctamente (Verde) */
        .exito {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        /* Estilo para cuando hay un error o no se encuentra (Rojo) */
        .error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
    </style>
</head>
<body>

<?php
function borrar($fecha, $mail) {
    // Formateamos la fecha
    $fecha_formateada = date('d-m-Y', strtotime($fecha));

    // Abrimos archivo original y temporal
    $orig = fopen("../../archivo/movimientos.txt", "r") or die("error");
    $temp = fopen("../../archivo/temporal.txt", "w") or die("error");

    $eliminado = false; // Bandera para saber si se borró algo

    // Recorremos el archivo original
    while (($linea = fgets($orig)) !== false) {
        $lineasita = trim($linea);
        if (empty($lineasita)) {
            fwrite($temp, $linea);
            continue;
        }
        $datos = explode("|", $lineasita);
        
        $campo_mail = $datos[1] ?? '';
        $campo_fecha = $datos[3] ?? '';

        // Si coincide, activamos la bandera y NO lo escribimos (lo borramos)
        if ($campo_fecha == $fecha_formateada && $campo_mail == $mail) {
            $eliminado = true; 
        } else {
            // Si no coincide, lo pasamos al temporal intacto
            fwrite($temp, $linea);
        }
    }

    // Cerramos los archivos
    fclose($orig);
    fclose($temp);

    // Reemplazamos el archivo viejo por el temporal limpio
    rename("../../archivo/temporal.txt", "../../archivo/movimientos.txt");

    // Mostramos el mensaje estilizado usando tus clases del CSS
    if ($eliminado) {
        echo '<div class="mensaje exito">Registro eliminado correctamente.</div>';
    } else {
        echo '<div class="mensaje error">No se encuentra ese usuario en esa fecha.</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Búsqueda</title>
    <link rel="stylesheet" href="../../styles/style8.css">
</head>
<body>
<?php
    if (isset($_POST['fecha']) && isset($_POST['mail'])) {
        $fecha = $_POST['fecha'];
        $mail = $_POST['mail'];

        // Llamamos a la función buscar para mostrar los resultados
        buscar($fecha, $mail);
    }
function buscar($fecha, $mail) {
    $archivo = "../../archivo/movimientos.txt";

    if (!file_exists($archivo)) {
        echo '<div class="mensaje error">El archivo de movimientos no existe.</div>';
        return;
    }

    // Formateamos la fecha
    $fecha_formateada = date('d-m-Y', strtotime($fecha));

    // Abrimos el archivo y buscamos coincidencias
    $orig = fopen($archivo, "r") or die("error");
    $coincidencias = [];

    while (($linea = fgets($orig)) !== false) {
        $linea = trim($linea);
        if (empty($linea)) {
            continue;
        }
        $campos = explode("|", $linea);

        $campo_mail = $campos[1] ?? '';
        $campo_fecha = $campos[3] ?? '';

        // Verificamos si coincide la fecha y el correo
        if ($campo_fecha == $fecha_formateada && $campo_mail == $mail) {
            $coincidencias[] = $campos;
        }
    }
    fclose($orig);

    // 1. Si NO hay coincidencias, mostramos el mensaje de error con el estilo
    if (empty($coincidencias)) {
        echo '<div class="mensaje error">No se encuentra ningún registro para ese usuario en esa fecha.</div>';
        return;
    }

    // 2. Si SÍ hay coincidencias, mostramos la tabla con los estilos
    echo '<table class="tabla-movimientos">';
    echo '<tr>';
    echo '<th class="violeta">Nombre</th>';
    echo '<th>Correo</th>';
    echo '<th>Categoria</th>';
    echo '<th>Fecha</th>';
    echo '</tr>';

    foreach ($coincidencias as $campos) {
        echo "<tr>";
        echo "<td>" . ($campos[0] ?? '') . "</td>";
        echo "<td>" . ($campos[1] ?? '') . "</td>";
        echo "<td>" . ($campos[2] ?? '') . "</td>";
        echo "<td>" . ($campos[3] ?? '') . "</td>";
        echo "</tr>";
    }
    echo '</table>';
}

?>