<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style0.css"> 
    <link rel="stylesheet" href="../styles/style2.css">
    <link rel="stylesheet" href="../styles/style4.css">  
</head>
<body>
    <main>
        <div id="principal">
            <div id="horizontal">
                <div  id="menu1">
                    <span id="TituloAct"> Hace una operación en el archivo</span>
                    <!-- Mostrar Tabla TXT -->
                    <button class="botonsito" type="button" onclick="window.open('../php/9-archivos/intermedioArch.php?accion=mostrar_txt', 'lienzo')">Mostrar Tabla (TXT)</button>

                    <!-- Buscar por ID TXT -->
                    <button class="botonsito" type="button" onclick="window.open('../php/9-archivos/intermedioArch.php?accion=form_buscar_txt', 'lienzo')">Buscar por ID (TXT)</button>

                    <!-- Borrar por ID TXT -->
                    <button class="botonsito" type="button" onclick="window.open('../php/9-archivos/intermedioArch.php?accion=form_borrar_txt', 'lienzo')">Borrar por ID (TXT)</button>
                </div>

                <iframe name="lienzo" id="LienzoBlanco" > </iframe>
                 
            </div>
            

            
            
        </div>
    </main>
</body>
</html>