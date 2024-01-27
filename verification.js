let myform = document.getElementById('myform');

myform.addEventListener('submit', function (e) {
    let nom = document.getElementById('nom').value;  
    let prenom = document.getElementById('prenom').value;  

    if (nom.trim() === "" || prenom.trim() === "") {
        e.preventDefault();
        alert("Le nom et le prénom doivent être valides");
    }
    else{
    let ncin = document.getElementById('cin').value;
    if (!/^\d{8}$/.test(ncin)) {
        e.preventDefault();
        alert("Le CIN doit être composé de 8 chiffres");
    }


    else{
    let tel = document.getElementById('tel').value;
    if (!/^\d{8}$/.test(tel)) {
        e.preventDefault();
        let myError = document.getElementById('error');
        myError.innerHTML = "Le téléphone n'est pas valide";
        myError.style.color = 'red';
    }
   else{
    let enc = document.getElementById('encadrant').value;
    if(enc.trim()===""){
        e.preventDefault();
        let error_enc = document.getElementById('error_enc');
        error_enc.innerHTML = "nom d'encadrant n'est pas valide";
        error_enc.style.color = 'red';
    }
    else{
        let type = document.getElementById('type').value;
    if(type.trim()===""){
        e.preventDefault();
        let error_type = document.getElementById('error_type');
        error_type.innerHTML = "nom d'encadrant n'est pas valide";
        error_type.style.color = 'red';
    }else{
    let niveau=document.getElementById('etude').value; 
    if(niveau.trim()===""){
        e.preventDefault();
        let myError_niveau = document.getElementById('error_niveau');
        myError_niveau.innerHTML = "Le niveau d'etude n'est pas valide";
        myError_niveau.style.color = 'red';
    }
    else{
        let paye = document.querySelector('input[name="payement"]:checked');
        
            if(paye.value === "Oui"){
                
            let mont=document.getElementById("montant").value;
            if(mont.trim() === "" || isNaN(mont) || +mont <= 0){
                e.preventDefault();
                let error_mont = document.getElementById('error_mont');
                error_mont.innerHTML = "veuillez saisir un montant";
                error_mont.style.color = 'red';
            }

        }}
    }}
   }
}}
});
