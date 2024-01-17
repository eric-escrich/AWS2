function mostrarBienvenida() {
    var nombre = document.getElementById("nombre").value;
    var mensajeBienvenida = document.getElementById("bienvenida");
    mensajeBienvenida.innerHTML = "Bienvenido " + nombre;
}

window.addEventListener("load", () => {
    document.getElementById("mostrarBienvenida").addEventListener("click", mostrarBienvenida);
});
