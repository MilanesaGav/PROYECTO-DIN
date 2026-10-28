
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

function buscar($fecha,$mail) {
    //formateamos fecha
    $fecha_formateada = date('d-m-Y', strtotime($fecha));

    //abrimos archivo original
    $orig=fopen("../../archivo/movimientos.txt","r") or die("error");

    //recorremos el archivo ORIGINAL para ir reemplazando en el temporal
    echo '<table border="1" style="border-collapse: collapse; margin-top: 20px;">
            <tr style="background-color: #f2f2f2;">              
                <th style="padding: 8px;">Nombre</th>  
                <th style="padding: 8px;">Correo</th>
                <th style="padding: 8px;">Categoria</th>          
                <th style="padding: 8px;">Horario</th>                 
            </tr>';  
            
    while(($linea=fgets($orig))!==false){
        $linea=trim($linea);
        $campos = explode("|", $linea);
         if (empty($linea)) {
            continue;
        }
        if($campos[3]==$fecha_formateada && $campos[1]==$mail){
            echo "<tr>";        
            echo "<td style='padding: 8px;'>" . ($campos[0] ?? '') . "</td>";            
            echo "<td style='padding: 8px;'>" . ($campos[1] ?? '') . "</td>";
            echo "<td style='padding: 8px;'>" . ($campos[2] ?? '') . "</td>";
            echo "<td style='padding: 8px;'>" . ($campos[3] ?? '') . "</td>";           
            echo "</tr>";
        }else{
            //nada
        }
    
    }      
    fclose($orig);
    echo '</table>';
}

?>