const boton = document.getElementById("BotonModal");
const abrirModal = document.getElementById("AbrirModal");
const fondoModal = document.getElementById("FondoModal");

// 1. Abrir el modal
abrirModal.addEventListener("click", function () {
    fondoModal.style.display = "flex";
});

// 2. Al hacer clic en "Aplicar colores"
boton.addEventListener("click", function () {
    const cfig = document.getElementById("ColorFigura").value;
    const cfondo = document.getElementById("ColorFondo").value;

    // Actualizamos los inputs ocultos del formulario para que el próximo envío lleve estos colores
    document.getElementById("inputHiddenCfig").value = cfig;
    document.getElementById("inputHiddenCfondo").value = cfondo;

    // Actualizamos el iframe si ya hay una figura cargada
    const lienzo = document.getElementById("LienzoBlanco");
    const urlActual = lienzo.getAttribute("src");

    if (urlActual && urlActual.trim() !== "") {
        const url = new URL(urlActual, window.location.href);
        url.searchParams.set("cfig", cfig);
        url.searchParams.set("cfondo", cfondo);
        lienzo.src = url.href;
    }

    // Cerramos el modal
    fondoModal.style.display = "none";
});