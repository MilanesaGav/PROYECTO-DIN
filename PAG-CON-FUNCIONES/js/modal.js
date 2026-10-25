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


*/