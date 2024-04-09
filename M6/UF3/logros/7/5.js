document.addEventListener('DOMContentLoaded', function() {
    var testimoniosHeader = document.getElementsByTagName('h3')[1];
    var testimoniosText = testimoniosHeader.nextElementSibling;
    var clickCount = 0;

    function toggleVisibility() {
        if (testimoniosText.style.display === 'none') {
            testimoniosText.style.display = 'block';
        } else {
            testimoniosText.style.display = 'none';
        }
        clickCount++;
        if (clickCount >= 3) {
            testimoniosHeader.removeEventListener('click', toggleVisibility);
        }
    }

    testimoniosHeader.addEventListener('click', toggleVisibility);
});