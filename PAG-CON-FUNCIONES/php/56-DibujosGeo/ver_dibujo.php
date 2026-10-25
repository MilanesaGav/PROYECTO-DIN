<?php
// Recogemos todos los parámetros que manden las tarjetas o el modal
$figura = isset($_GET['figura']) ? $_GET['figura'] : 'circle';
$patron = isset($_GET['patron']) ? $_GET['patron'] : 1;
$cfig = isset($_GET['cfig']) ? $_GET['cfig'] : '#800080';
$cfondo = isset($_GET['cfondo']) ? $_GET['cfondo'] : '#de0000';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visualizador</title>
    <style>
        /* Hacemos que la página ocupe toda la pantalla del iframe y centre su contenido */
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff; /* Color de fondo del espacio blanco del iframe */
        }
        /* Opcional: le da una pequeña sombra a la imagen para que destaque más */
        img {
            max-width: 100%;
            height: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <!-- Insertamos la imagen apuntando a img.php y le pasamos todos los datos -->
    <img src="img.php?figura=<?php echo $figura; ?>&patron=<?php echo $patron; ?>&cfig=<?php echo urlencode($cfig); ?>&cfondo=<?php echo urlencode($cfondo); ?>" alt="Figura Geométrica">

</body>
</html>