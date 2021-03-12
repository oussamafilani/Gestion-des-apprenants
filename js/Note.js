// Note Form Validation
document.forms["NoteForm"].addEventListener("submit",function(e){
    let erreur;
    let inputs = this;
// Traitement cas par cas input unique


// Traitement Générique
    for(let i = 0 ;i < inputs.length; i++){
        // console.log(inputs[i].value);
        if(!inputs[i].value){
            erreur = "Veuillez renseigner tous les champs";
            // inputs[i].style.borderColor = "red";

        }
    }

    if(erreur){
        e.preventDefault();
        document.getElementById("erreur2").innerHTML = erreur;
        return false;
    }
})
