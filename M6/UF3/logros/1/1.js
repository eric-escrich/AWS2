document.getElementById('titulo').textContent = "Mis vidiojuegos - Escrich Almagro";

var navigationLinks = document.getElementsByClassName('navigation-link');
for (var i = 0; i < navigationLinks.length; i++) {
    navigationLinks[i].href = "https://www.vidaextra.com/";
}

document.getElementsByName('paisaje')[0].alt = "¿Otra vez aqui?";