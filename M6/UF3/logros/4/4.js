document.addEventListener("DOMContentLoaded", function() {
    var facebookLink = document.getElementById("mi-facebook");
    facebookLink.textContent = "Mi Twitter";
    facebookLink.href = "http://twitter.com/mi/pagina/de/twitter";

    var legalSection = document.querySelector("footer");
    var legalLinks = legalSection.querySelectorAll("h4, #aviso-legal");
    legalLinks.forEach(function(element) {
        element.parentNode.removeChild(element);
    });
});