
const boton = document.getElementById("BotonModal");
const abrirModal = document.getElementById("AbrirModal");
const fondoModal = document.getElementById("FondoModal");

abrirModal.addEventListener("click", function () {
    fondoModal.style.display = "flex";
});

boton.addEventListener("click", function () {

    // Obtenemos los colores elegidos
    const cfig = document.getElementById("ColorFigura").value;
    const cfondo = document.getElementById("ColorFondo").value;

    // Buscamos la tarjeta que se seleccionó anteriormente
    const parametros = new URLSearchParams(window.location.search);

    const figura = parametros.get("figura") || "circle";

    // Obtenemos el iframe
    const lienzo = document.getElementById("LienzoBlanco");

    // Si todavía no eligieron una tarjeta, usamos el patrón 1
    const urlActual = lienzo.getAttribute("src") || "";

    const patronURL = new URLSearchParams(
        urlActual.includes("?") ? urlActual.split("?")[1] : ""
    );

    const patron = patronURL.get("patron") || "1";

    // Construimos la dirección del PHP intermediario
    const url = new URL(
        "../php/56-DibujosGeo/ver_dibujo.php",
        window.location.href
    );

    url.searchParams.set("figura", figura);
    url.searchParams.set("patron", patron);
    url.searchParams.set("cfig", cfig);
    url.searchParams.set("cfondo", cfondo);

    // Mostramos el resultado en el iframe
    lienzo.src = url.href;

    // Cerramos el modal
    fondoModal.style.display = "none";
});
