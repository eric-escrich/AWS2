var el = document.querySelector(".box");
let position = 0;

el.addEventListener("click", clickedBox, false);

function clickedBox(evt) {
    switch (position) {
        case 0:
            el.style.left = "300px";
            position = 1;
            break;
        case 1:
            el.style.top = "300px";
            position = 2;
            break;
        case 2:
            el.style.left = "0px";
            position = 3;
            break;
        case 3:
            el.style.top = "0px";
            position = 0;
            break;
    }
}
