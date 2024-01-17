document.addEventListener("DOMContentLoaded", function() {
    // Obtener elementos del DOM
    var enlace = document.querySelector("a");
    var parrafo = document.querySelector("p");

    // Función para alternar entre mostrar y ocultar el texto
    function alternarTexto() {
      if (parrafo.style.display === "none" || parrafo.style.display === "") {
        parrafo.style.display = "block";
        enlace.textContent = "ocultar texto";
      } else {
        parrafo.style.display = "none";
        enlace.textContent = "mostrar texto";
      }
    }

    // Agregar evento de clic al enlace
    enlace.addEventListener("click", alternarTexto);
});