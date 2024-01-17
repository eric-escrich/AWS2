function mostrarResultado() {
    var nota = document.getElementById("nota").value;

    if (nota >= 0 && nota <= 10) {
        if (nota >= 9) {
            document.getElementById("resultado").innerText = "Excelente";
        } else if (nota >= 7) {
            document.getElementById("resultado").innerText = "Notable";
        } else if (nota >= 5) {
            document.getElementById("resultado").innerText = "Suficiente";
        } else {
            document.getElementById("resultado").innerText = "Insuficiente";
        }
    } else {
        document.getElementById("resultado").innerText = "Por favor, ingrese una nota válida entre 0 y 10.";
    }
}