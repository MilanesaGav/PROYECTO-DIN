/*
Si quieres hacerlo todo desde JavaScript sin crear una clase en CSS aparte, puedes modificar la propiedad display directamente comprobando su estado actual.

JavaScript
const boton = document.getElementById('miBoton');
const div = document.getElementById('miDiv');

boton.addEventListener('click', () => {
  if (div.style.display === 'none' || div.style.display === '') {
    div.style.display = 'block'; // Lo muestra
  } else {
    div.style.display = 'none';  // Lo oculta
  }
});

*/

/*
    Puedes cambiar cualquier propiedad de CSS desde JavaScript usando la notación de punto (style.propiedad),
     con un pequeño detalle en los nombres que tienen guiones.

    En CSS escribes background-color, pero en JavaScript 
    (por la sintaxis de las variables) 
    se escribe en formato camelCase =====>>> backgroundColor.

ESTO ES DE GAV
*/

//================================================================
// ================= ABRIR MODAL  ================================
const abrir = document.getElementById('AbrirModal');
const div = document.getElementById('FondoModal');

abrir.addEventListener('click', () => {
  if (div.style.display === 'none' || div.style.display === '') {
    div.style.display = 'flex'; // Lo muestra
  } else {
    div.style.display = 'none';  // Lo oculta
  }
});


// ====================================================================
// =================COLOR MODAL DE DISEÑOS PREHECHOS  =================
const boton=document.getElementById("BotonModal")
const fondo = document.getElementById('ColorFondo');
const linea = document.getElementById('ColorLineas');

boton.addEventListener('click', () => {
  const f = fondo.value;
  const l= linea.value;

  // Empaquetamos los datos en un objeto / struct
  const datos = {
    fondo: f,
    linea: l
  };

  // Enviamos los datos al archivo PHP mediante POST
  fetch('guardar-colores.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  })
  .then(response => response.text())
  .then(resultado => {
    console.log("Respuesta de PHP:", resultado);
    alert('¡Colores guardados con éxito!');
  })
  .catch(error => {
    console.error("Hubo un error:", error);
  });
});