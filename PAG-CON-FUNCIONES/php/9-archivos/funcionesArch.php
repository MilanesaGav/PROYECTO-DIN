
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

function buscarTxt($fecha) {
    $archivo = "datos.txt";
    if (!file_exists($archivo)) {
        echo "<p>El archivo datos.txt aún no existe.</p>";
        return;
    }

    $encontrado = false;
    $campos = [];
    $archi = fopen($archivo, "r") or die("Error al abrir el archivo");
    while (($linea = fgets($archi)) !== false) {
        $linea = trim($linea);
        if (empty($linea)) {
            continue;
        }
        $linea_separada = explode("|", $linea);
        if ($linea_separada[0] == $id) {
            $campos = $linea_separada;
            $encontrado = true;
            break; 
        }
    }
    fclose($archivo);

    if ($encontrado) {
        echo "<h2>Datos del registro con ID: " . htmlspecialchars($id) . "</h2>";
        echo '<table border="1" style="border-collapse: collapse; margin-top: 20px;">
                <tr style="background-color: #f2f2f2;">           
                    <th style="padding: 8px;">ID</th>          
                    <th style="padding: 8px;">Nombre</th>  
                    <th style="padding: 8px;">Correo</th>
                    <th style="padding: 8px;">Edad</th>          
                    <th style="padding: 8px;">DNI</th>          
                    <th style="padding: 8px;">Teléfono</th>          
                    <th style="padding: 8px;">Contraseña</th>          
                </tr>';
        echo "<tr>";        
        echo "<td style='padding: 8px;'>" . $campos[0] . "</td>";            
        echo "<td style='padding: 8px;'>" . $campos[1] . "</td>";
        echo "<td style='padding: 8px;'>" . $campos[2] . "</td>";
        echo "<td style='padding: 8px;'>" . $campos[3] . "</td>";      
        echo "<td style='padding: 8px;'>" . $campos[4] . "</td>";      
        echo "<td style='padding: 8px;'>" . $campos[5] . "</td>";      
        echo "<td style='padding: 8px;'>" . $campos[6] . "</td>";      
        echo "</tr></table>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>No se encontró ningún registro con el ID: " . htmlspecialchars($id) . "</p>";
    }
}

function borrar($f) {
    $FechaFormateada = date('d-m-Y', strtotime($f));
    $archivo = "../../archivo/movimientos.txt";
    if (!file_exists($archivo)) {
        echo "<p>El archivo datos.txt aún no existe.</p>";
        return;
    }

    $vec_aux = [];
    $archi = fopen($archivo, "r") or die("errrorrrr");
    
    while (($linea = fgets($archi)) !== false) {
        $linea = trim($linea);
        if (empty($linea)) {
            continue;
        }
        $campos = explode("|", $linea);
        if ($campos[3] == $FechaFormateada) {
            continue; // Se salta el registro a borrar
        }
        $vec_aux[] = $linea . "\n";
    }
    fclose($archi);

    // Reescribimos el archivo con los elementos restantes
    $fp = fopen($archivo, "w") or die("No se pudo abrir el archivo para escribir.");
    foreach ($vec_aux as $linea_aux) {
        fwrite($fp, $linea_aux);
    }
    fclose($fp);
    
    echo "<h1>Datos borrados correctamente</h1>";
}

?>