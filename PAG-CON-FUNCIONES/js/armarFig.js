const boton = document.getElementById("BotonModal");
const abrirModal = document.getElementById("AbrirModal");
const fondoModal = document.getElementById("FondoModal");

// 1. Abrir el modal[cite: 18]
abrirModal.addEventListener("click", function () {
    fondoModal.style.display = "flex";
});

// 2. Al hacer clic en "Aplicar colores"[cite: 18]
boton.addEventListener("click", function () {
    const cfig = document.getElementById("ColorFigura").value;
    const cfondo = document.getElementById("ColorFondo").value;

    // Actualizamos los inputs ocultos del formulario para futuros envíos[cite: 18]
    document.getElementById("inputHiddenCfig").value = cfig;
    document.getElementById("inputHiddenCfondo").value = cfondo;

    const lienzo = document.getElementById("LienzoBlanco");

    try {
        // Leemos la URL real actual del contenido interno del iframe[cite: 18]
        const urlActual = lienzo.contentWindow.location.href;

        if (urlActual && urlActual.includes("?")) {
            const url = new URL(urlActual);
            // Actualizamos los parámetros de color sin perder las coordenadas
            url.searchParams.set("cfig", cfig);
            url.searchParams.set("cfondo", cfondo);
            lienzo.src = url.href;
        }
    } catch (error) {
        console.error("No se pudo actualizar el iframe automáticamente: ", error);
    }

    // Cerramos el modal[cite: 18]
    fondoModal.style.display = "none";
});