<?php
// 1. ESTO VA ARRIBA DE TODO (Antes del <!DOCTYPE html>)
// Atrapamos la figura que eligió en la página anterior (círculo, cuadrado, etc.)
$figura = isset($_GET['figura']) ? $_GET['figura'] : 'circle';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style0.css">
    <link rel="stylesheet" href="../styles/style6.css">
    <link rel="stylesheet" href="../styles/modal2.css">    
</head>
<body>
    <main>
        <div id="principal">
            <div id="horizontal">
                
                <!-- Menú lateral izquierdo -->
                <div id="menu1">
                    
                    <div class="botonera">
                        <span id="TituloAct"> ¿Que queres hacer con la figura?</span>
                        <!-- Tarjeta 1 -->

                       <!-- 
                         ENLACE DINÁMICO DE LA TARJETA:
                        1. "../php/img.php" -> Va al archivo central que procesa la imagen.
                        2. "?figura=?php echo $figura; ?" -> Pasa la figura que el usuario eligió antes (ej: cuadrado).
                        3. "&patron=1" -> Pasa el número de patrón específico de esta tarjeta (Figura Individual).
                        4. target="lienzo" -> Muestra el resultado de PHP dentro del iframe sin recargar la página.
                        -->
                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=1" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Figura Individual</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Figura Individual</h3>
                                    <p>Ver el dibujo de la figura seleccionada.</p>
                                </div>
                            </div>
                        </a>

                        <!-- Tarjeta 2 -->
                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=2" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Grilla</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Grilla</h3>
                                    <p>Ver grilla del dibujo.</p>
                                </div>
                            </div>
                        </a>

                        <!-- Tarjeta 3 -->
                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=3" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Cruce en X</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Cruce en X</h3>
                                    <p>Ver cruce en X de la figura.</p>
                                </div>
                            </div>
                        </a>

                        <!-- Tarjeta 4 -->
                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=4" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Uno dentro del otro</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Uno dentro del otro</h3>
                                    <p>Ver el dibujo de la figura dentro de otra.</p>
                                </div>
                            </div>
                        </a>

                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=5" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Menor a mayor</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Menor a mayor</h3>
                                    <p>Ver el dibujo de la figura menor respecto a otra.</p>
                                </div>
                            </div>
                        </a>

                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=6" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Flor de Figuras</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Flor de Figuras</h3>
                                    <p>Ver el dibujo de la flor de figuras.</p>
                                </div>
                            </div>
                        </a>

                        <a href="../php/56-DibujosGeo/ver_dibujo.php?figura=<?php echo $figura; ?>&patron=7" target="lienzo" class="tarjeta">
                            <div class="tarjeta-inner">
                                <div class="tarjeta-front">
                                    <h3>Anillo</h3>
                                </div>
                                <div class="tarjeta-back">
                                    <h3>Anillo</h3>
                                    <p>Ver el dibujo del anillo de figuras.</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Lienzo de la derecha -->
                <iframe name="lienzo" id="LienzoBlanco"></iframe>

            </div>
        </div>
        <div id="FondoModal">
    <div id="modal">

        <div id="ParteModal">

            <!-- Lado izquierdo: color de la figura -->
            <div class="ContainerSelector">
                <h3>Color de la figura</h3>

                <input type="color" id="ColorFigura" value="#800080">
            </div>

            <!-- Lado derecho: color del fondo -->
            <div class="ContainerSelector">
                <h3>Color del fondo</h3>

                <input type="color" id="ColorFondo" value="#de0000">
            </div>

        </div>

        <button class="botonsito" id="BotonModal">
            Aplicar colores
        </button>

    </div>
</div>
       

    </main>

    <script src="../js/colores.js"></script>
</body>
</html>