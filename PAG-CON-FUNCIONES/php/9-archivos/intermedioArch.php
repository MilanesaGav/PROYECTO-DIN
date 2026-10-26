<?php
include("funcionesArch.php");

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    switch ($accion) {
        // --- MOSTRAR TABLA DESDE TXT ---
        case 'mostrar_txt':
            mostrarTablaTxt();
            break;

        // --- MOSTRAR FORMULARIO DE BÚSQUEDA TXT ---
        case 'form_buscar_txt':
            ?>
            <h3>Mostrar registro por ID</h3>
            <form action="intermedioArch.php?accion=procesar_buscar_txt" method="POST">
                <label>Ingrese el ID que quiere ver:</label><br><br>
                <input type="number" name="id" placeholder="Ingrese id.." required><br><br>
                <button type="submit">Buscar</button>
            </form>
            <?php
            break;

        // --- PROCESAR BÚSQUEDA TXT ---
        case 'procesar_buscar_txt':
            if (isset($_POST['id'])) {
                buscarTxt($_POST['id']);
            }
            break;

        // --- MOSTRAR FORMULARIO DE BORRAR TXT ---
        case 'form_borrar_txt':
            ?>
            <h3>Borrar Registro por ID</h3>
            <form action="intermedioArch.php?accion=procesar_borrar_txt" method="POST">
                <label>Ingrese el ID a borrar:</label><br><br>
                <input type="number" name="id" placeholder="Ingrese id.." required><br><br>
                <button type="submit" style="background-color: red; color: white;">Borrar</button>
            </form>
            <?php
            break;

        // --- PROCESAR BORRADO TXT ---
        case 'procesar_borrar_txt':
            if (isset($_POST['id'])) {
                borrarTxt($_POST['id']);
            }
            break;

        default:
            echo "Selecciona una opción del menú.";
            break;
    }
} else {
    echo "Bienvenido. Haz clic en una opción de la izquierda.";
}
?>