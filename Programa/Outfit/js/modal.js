const botonAbrirModal = document.getElementById("abrir-modal");
const miModal = document.getElementById("mi-modal");
const botonCerrarModal = document.querySelector(".cerrar-modal");
const formulario = document.querySelector("form");

// Abrir ventana modal al hacer clic en el enlace
botonAbrirModal.addEventListener("click", (event) => {
  event.preventDefault(); // Evitar el comportamiento por defecto del enlace
  miModal.style.display = "block";
});

// Cerrar ventana modal al hacer clic en la "x"
botonCerrarModal.addEventListener("click", () => {
  miModal.style.display = "none";
});

// Cerrar ventana modal al hacer clic fuera del contenido
window.addEventListener("click", (event) => {
  if (event.target === miModal) {
    miModal.style.display = "none";
  }
});

// Enviar el formulario
formulario.addEventListener("submit", (event) => {
  event.preventDefault(); // Evitar el comportamiento por defecto del formulario
  // Procesar el formulario aquí...
  // Mostrar un mensaje de éxito o error...
  miModal.style.display = "none"; // Cerrar la ventana modal
});
