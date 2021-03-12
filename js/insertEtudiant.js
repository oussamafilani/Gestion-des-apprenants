// Insert Etudiant Form Validation
document.forms["insertEtuFrom"].addEventListener("submit",function(e){
    let erreur;
    let inputs = document.getElementsByClassName("validetu");
// Traitement cas par cas input unique



// Traitement Générique
    for(let i = 0 ;i < inputs.length; i++){
        // console.log(inputs[i].value);
        if(!inputs[i].value){
            erreur = "Veuillez renseigner tous les champs";
            inputs[i].style.borderColor = "red";

        }else{
            inputs[i].style.borderColor = "";

        }
    }

    if(erreur){
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    }
})
