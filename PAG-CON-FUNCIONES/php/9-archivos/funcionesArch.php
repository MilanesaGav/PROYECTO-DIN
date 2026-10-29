
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
                <th style="padding: 8px;">Nombre</th>  
                <th style="padding: 8px;">Correo</th>
                <th style="padding: 8px;">Categoria</th>          
                <th style="padding: 8px;">Horario</th>                 
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

function borrar($fecha,$mail) {
    //formateamos fecha
    $fecha_formateada = date('d-m-Y', strtotime($fecha));

    //abrimos archivo original
    $orig=fopen("../../archivo/movimientos.txt","r") or die("error");

    //abrimos archivo temporal (LO ABRIMOS CON W POR SI EL USUARIO TIENE Q CAMBIAR MUCHOS DATOS)
    $temp=fopen("../../archivo/temporal.txt","w") or die("error");

    //recorremos el archivo ORIGINAL para ir reemplazando en el temporal
    while(($linea=fgets($orig))!==false){
        $linesita=trim($linea);
        $datos=explode("|",$linesita);
        if($datos[3]==$fecha_formateada && $datos[1]==$mail){
            //nada
        }else{
            fwrite($temp,$linea);
        }
    }

    //ahora cerramos los dos archivos
    fclose($orig);
    fclose($temp);

    //x ultimo le cambiamos el nombre a los archivos
    //chau.txt pasa a llamarse hola.txt
    //y hola.txt (original) pasa a MORIRRRR
    rename("../../archivo/temporal.txt","../../archivo/movimientos.txt");
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
    } else {
        echo '<div class="mensaje error">Por favor, proporciona una fecha y un correo electrónico.</div>';
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
    echo '<th>Horario</th>';
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