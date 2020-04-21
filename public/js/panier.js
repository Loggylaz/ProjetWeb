// Get the button, and when the user clicks on it, execute myFunction
// document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
// document.getElementById("myBtn").addEventListener("click", function(){ 
//     document.getElementById("text").innerText = "GeeksforGeeks"; 
// }); 
function myFunction() {
  document.getElementById("monPanier").classList.toggle("show");
}
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('myBtn').addEventListener("click", function() {myFunction();});
});
