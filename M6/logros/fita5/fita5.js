function esPar(numero) {
    return numero % 2 === 0;
}

function esPrimo(numero) {
    if (numero <= 1) return false;
    for (let i = 2; i <= Math.sqrt(numero); i++) {
        if (numero % i === 0) {
            return false;
        }
    }
    return true;
}

function verificarNumero() {
    const numero = document.getElementById("numeroInput").value;

    const esParResultado = esPar(numero);
    const resultadoPar = document.getElementById("resultadoPar");
    if (esParResultado) {
        resultadoPar.innerHTML = `El número ${numero} es par`;
    } else {
        resultadoPar.innerHTML = `El número ${numero} no es par`;
    }

    const esPrimoResultado = esPrimo(numero);
    const resultadoPrimo = document.getElementById("resultadoPrimo");
    if (esPrimoResultado) {
        resultadoPrimo.innerHTML = `El número ${numero} es primo`;
    } else {
        resultadoPrimo.innerHTML = `El número ${numero} no es primo`;
    }
}

// crea una funcion para ver si un numero es par y otra funcion para comprobar si un número es primo
// crea una pagina que te deje introducir un número en un input y un boton que al clicarlo nos diga si el numero introducido es par o no, y nos diga si es primo o no