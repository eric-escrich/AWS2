
document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.remove("no-js");

    // Check to see if Media-Queries are supported
    if (window.matchMedia) {
        // Check if the dark-mode Media-Query matches
        if(window.matchMedia('(prefers-color-scheme: dark)').matches){
            document.body.classList.add("dark-mode");
        }
    } else {
        alert("You can't enable darkMode")
    }
});

function myFunction (){
    document.body.classList.toggle("dark-mode");
}
  
  