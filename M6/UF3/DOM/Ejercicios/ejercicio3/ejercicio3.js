function createLabel() {
    // Crear el elemento label
    var label = document.createElement("label");
    // Establecer el atributo 'for'
    label.setAttribute("for", "label_otros");
    label.setAttribute("id", "otros_input");
    // Establecer el texto dentro del label
    label.innerText = "Especificar:";
    return label;
}

function createInput() {
    let input = document.createElement("input");
    input.setAttribute("id", "input_otros");
    input.type = "text";
    input.name = "otros_input";
    return input;
}

function removeLabel() {
    var label = document.getElementById("label_otros");
    if (label) {
        var formulario = document.querySelector("form");
        formulario.removeChild(label);
    }
}

function removeInput() {
    var input = document.getElementById("input_otros");
    if (input) {    
        var formulario = document.querySelector("form");
        formulario.removeChild(input);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Obtener elementos del DOM
    const otroRadio = document.getElementsByTagName("input")[2];
    var formulario = document.querySelector("form");
    

    // Agregar evento de click al enlace
    otroRadio.addEventListener("click", () => {
        if (otroRadio.checked) {
            const label = createLabel();
            const input = createInput();
    
            formulario.insertBefore(label, formulario.lastElementChild);
            formulario.insertBefore(input, formulario.lastElementChild);
        } else {
            removeLabel();
            removeInput();
        }
        
        
    });
});