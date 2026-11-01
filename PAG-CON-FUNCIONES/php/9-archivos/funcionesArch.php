<?php
// funcionesArch.php

function cargar($nombre, $mail, $categoria) {
    $hoy = date("d-m-Y");
    $archivo = fopen("../../archivo/movimientos.txt", "a");
    fwrite($archivo, "$nombre|$mail|$categoria|$hoy \n");
    fclose($archivo);
    header("Location: ../../templates/3-MenuPrincipal.html");
}

function tabla() {
    $archivo = "../../archivo/movimientos.txt";
    if (!file_exists($archivo)) {
        echo '<div class="mensaje error">El archivo de movimientos aún no existe.</div>';
        return;
    }
    
    $archi = fopen($archivo, "r") or die("Error al abrir el archivo");
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../styles/style8.css">
    </head>
    <body>
        <div class="table-container">
            <table>
                <thead>
                    <tr>              
                        <th class="violeta">Nombre</th>  
                        <th class="violeta">Correo</th>
                        <th class="violeta">Categoria</th>          
                        <th class="violeta">Fecha</th>                 
                    </tr>
                </thead>
                <tbody>
                   <?php
                   while (($linea = fgets($archi)) !== false) {
                       $linea = trim($linea);
                       if (empty($linea)) {
                           continue;
                       }
                       $campos = explode("|", $linea);
                   ?>
                    <tr>        
                        <td><?php echo ($campos[0] ?? ''); ?></td>            
                        <td><?php echo ($campos[1] ?? ''); ?></td>
                        <td><?php echo ($campos[2] ?? ''); ?></td>
                        <td><?php echo ($campos[3] ?? ''); ?></td>           
                    </tr>
                   <?php    
                   }      
                   fclose($archi);
                   ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}

function borrar($fecha, $mail) {
    $fecha_formateada = date('d-m-Y', strtotime($fecha));

    $orig = fopen("../../archivo/movimientos.txt", "r") or die("error");
    $temp = fopen("../../archivo/temporal.txt", "w") or die("error");

    $eliminado = false;

    while (($linea = fgets($orig)) !== false) {
        $lineasita = trim($linea);
        if (empty($lineasita)) {
            fwrite($temp, $linea);
            continue;
        }
        $datos = explode("|", $lineasita);
        
        $campo_mail = $datos[1] ?? '';
        $campo_fecha = $datos[3] ?? '';

        if ($campo_fecha == $fecha_formateada && $campo_mail == $mail) {
            $eliminado = true; 
        } else {
            fwrite($temp, $linea);
        }
    }

    fclose($orig);
    fclose($temp);

    rename("../../archivo/temporal.txt", "../../archivo/movimientos.txt");
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../styles/style8.css">
    </head>
    <body>
        <?php if ($eliminado) { ?>
            <div class="mensaje exito">Registro eliminado correctamente.</div>
        <?php } else { ?>
            <div class="mensaje error">No se encuentra ese usuario en esa fecha.</div>
        <?php } ?>
    </body>
    </html>
    <?php
}

function buscar($fecha, $mail) {
    $archivo = "../../archivo/movimientos.txt";

    if (!file_exists($archivo)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head><link rel="stylesheet" href="../../styles/style8.css"></head>
        <body><div class="mensaje error">El archivo de movimientos no existe.</div></body>
        </html>
        <?php
        return;
    }

    $fecha_formateada = date('d-m-Y', strtotime($fecha));
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

        if ($campo_fecha == $fecha_formateada && $campo_mail == $mail) {
            $coincidencias[] = $campos;
        }
    }
    fclose($orig);
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../styles/style8.css">
    </head>
    <body>
    <?php
    if (empty($coincidencias)) {
        echo '<div class="mensaje error">No se encuentra ningún registro para ese usuario en esa fecha.</div>';
    } else {
        echo '<div class="table-container">';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="violeta">Nombre</th>';
        echo '<th class="violeta">Correo</th>';
        echo '<th class="violeta">Categoria</th>';
        echo '<th class="violeta">Fecha</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($coincidencias as $campos) {
            echo "<tr>";
            echo "<td>" . ($campos[0] ?? '') . "</td>";
            echo "<td>" . ($campos[1] ?? '') . "</td>";
            echo "<td>" . ($campos[2] ?? '') . "</td>";
            echo "<td>" . ($campos[3] ?? '') . "</td>";
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    ?>
    </body>
    </html>
    <?php
}
?>