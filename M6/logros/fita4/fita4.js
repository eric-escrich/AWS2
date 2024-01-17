function simularTiradas() {
    var pares = [];
    let tiradas = [];

    for (var i = 0; i < 5; i++) {
        var resultado = Math.floor(Math.random() * 20) + 1;

        tiradas.push(resultado);
        if (resultado % 2 === 0) {
            pares.push(resultado);
        }
    }

    document.getElementById('pares').textContent = pares.join(', ');
    // document.getElementById('resultados').textContent = tiradas.join(', ');
}

// realiza un programa que simule 5 tiradas de un dade de 20 caras. Guarda en un array solo los resultados pares e imprime ese array