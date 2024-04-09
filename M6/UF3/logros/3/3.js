window.addEventListener("load", () => {
    var ol = document.createElement("ol");

    var elementoA = document.createElement("li");
    var elementoB = document.createElement("li");

    elementoA.textContent = "elementoA";
    elementoB.textContent = "elementoB";

    ol.appendChild(elementoA);
    ol.appendChild(elementoB);

    var paragraphs = Array.from(document.getElementsByTagName('p'));
    var element = paragraphs.find(p => p.textContent === "Me gusta mucho esta página.");

    if (element) {
        element.parentNode.insertBefore(ol, element.nextSibling);
    }
});