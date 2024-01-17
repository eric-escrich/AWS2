
let boton = document.getElementById("checkAge");

function modifyText(texto) {
   let parrafo = document.getElementById("ageCheck");
   parrafo.innerHTML = texto;
 }

 function comprobar() {   
   let edad = document.getElementById('age').value;
   if (edad >= 18) {
      modifyText('Eres mayor de edad');
   } else {
      modifyText('No eres mayor de edad')
   }
 }