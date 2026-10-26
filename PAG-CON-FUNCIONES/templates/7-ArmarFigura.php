<?php
// Capturamos los colores que vienen por URL (GET) o asignamos unos por defecto
$cfig = isset($_GET['cfig']) ? $_GET['cfig'] : '#800080';
$cfondo = isset($_GET['cfondo']) ? $_GET['cfondo'] : '#de0000';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style7.css"> 
    <link rel="stylesheet" href="../styles/modal2.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> 
</head>
<body>
    <main>
        <div id="principal">
            <div id="horizontal">
                <div id="menu1">
                    <div class="menu-top">
                        <span id="TituloAct">Ingresa coordenadas</span>
                        <button id="AbrirModal" class="btn-color-chiquito" type="button" title="Cambiar colores">
                            <i class="bi bi-palette-fill"></i>
                        </button>
                    </div>

                    <!-- El formulario envía las coordenadas Y también los colores actuales -->
                    <form action="../php/7-ArmarFigura/7-ArmarFiguraFuncion.php" method="GET" target="lienzo">
                         <label class="LabelForm">Ingrese X1: <br> (Punto de inicio) </label><br>
                        <input class="InputForm" type="number" name="x1" placeholder="(0-600)" required><br>
        
                        <label class="LabelForm">Ingrese Y1: <br>(Punto de inicio) </label><br>
                        <input class="InputForm" type="number" name="y1" placeholder="(0-600)" required><br>

                        <label class="LabelForm">Ingrese X2: <br>(Punto final) </label><br>
                        <input class="InputForm" type="number" name="x" placeholder="(0-600)" required><br>
        
                        <label class="LabelForm">Ingrese Y2: <br>(Punto final): </label><br>
                        <input class="InputForm" type="number" name="y" placeholder="(0-600)" required><br>

                        <!-- Inputs ocultos para que el color no se pierda al enviar el formulario -->
                        <input type="hidden" name="cfig" id="inputHiddenCfig" value="<?php echo htmlspecialchars($cfig, ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="cfondo" id="inputHiddenCfondo" value="<?php echo htmlspecialchars($cfondo, ENT_QUOTES, 'UTF-8'); ?>">
        
                        <button class="botonsito" type="submit">Enviar</button>
                    </form>
                </div>

                <iframe name="lienzo" id="LienzoBlanco"></iframe>
            </div>

            <div id="FondoModal">
                <div id="modal">
                    <div id="ParteModal">
                        <!-- Lado izquierdo: color de la figura -->
                        <div class="ContainerSelector">
                            <h3>Color de la figura</h3>
                            <input type="color" id="ColorFigura" value="<?php echo htmlspecialchars($cfig, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>

                        <!-- Lado derecho: color del fondo -->
                        <div class="ContainerSelector">
                            <h3>Color del fondo</h3>
                            <input type="color" id="ColorFondo" value="<?php echo htmlspecialchars($cfondo, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                    </div>

                    <button class="botonsito" id="BotonModal">
                        Aplicar colores
                    </button>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/armarFig.js"></script>
</body>
</html>