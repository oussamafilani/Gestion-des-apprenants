// Seance Form Validation
document.forms["contactForm"].addEventListener("submit",function(e){
    let erreur;
    let name = document.getElementById("name");
    let email = document.getElementById("email");
// Traitement cas par cas input unique


// Traitement Générique

        if(name.value == "" || email.value == "" ){
            erreur = "Veuillez renseigner tous les champs";
            // inputs[i].style.borderColor = "red";

        }

    if(erreur){
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    }
})
