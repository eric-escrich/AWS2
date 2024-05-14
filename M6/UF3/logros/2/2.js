var articles = document.getElementsByTagName('article');
for (var i = 0; i < articles.length; i++) {
    var pElements = articles[i].children;
    for (var j = 0; j < pElements.length; j++) {
        if (pElements[j].tagName === 'P') {
            pElements[j].textContent = "Escrich Almagro";
        }
    }
}