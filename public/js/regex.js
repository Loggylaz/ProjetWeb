function validation(e){
    // regexp commence toujours par un "/"
    var regex =  /[^a-zA-Z0-9]/; // vérifie si la chaîne commence et termine par au moins un caractère entre a-z et/ou A-Z.
    var value = e.srcElement.login.value;
    if(regex.test(value)){
        alert('Pas de caractères spéciaux ni d\'espace dans le login!');
        e.preventDefault();
    }
}


// On se souscrit à l'event DOMContentLoaded du document.
// De cette façon, le chargement du javascript peut se faire dans la balise <head> car la fonction anonyme liée à l'event ne sera exécutée qu'après le chargement du DOM.
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('signup').addEventListener("submit", function() {validation(event);});
});
