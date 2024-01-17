function getFibonacciReps() {
   const reps = document.getElementById("fibTerms").value;
   console.log(reps);
   document.getElementById("fibSeries").innerHTML = generateFibonacci(reps);
}

function generateFibonacci(reps, x=0, y=1, res="1", i=1) {
   res += ", " + (x+y);
   if (reps-1 == i) {
      return res;
   } else {
      return generateFibonacci(reps, y, x+y, res, i+1);
   }
}

addEventListener("load", () => {
});
addEventListener("load", init);
function init() {
   document.getElementById("generateFib").addEventListener("click", getFibonacciReps);
}


