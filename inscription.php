<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
      
      <title>Inscription</title>
    </head>
    <body>
        <header>
          <img class="navbar-brand logo" src="images/tunisiaflag.png" >
            Ministère des Technologies de la Communication et de l'economie numerique
         
        </header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                <div class="container-fluid">
                <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarScroll"
          aria-controls="navbarScroll"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                <img class="navbar-brand logo" src="images/cnilogo.jpg">
              <ul  class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav justify-content-end"
              style="--bs-scroll-height: 100px">
                <li class="nav-item nav-link">Accueil</li>
                <li class="nav-item nav-link">A propos de Nous</li>
                <li class="nav-item nav-link">Prestations</li>
                <li class="nav-item nav-link">Contact</li>

              </ul> </div> </div>
            </nav>
            <div class="container-fluid ">
              <div class="formulaire">
                <h1>Fiche d'inscription au stage</h1><br><br>
                <form class="needs-validation" novalidate method="POST" action="traitement.php" id="myform" >
                    
                  <div class="row g-3">
                    <div class="col">  
                    <label >Nom</label>
                    <input type="text" class="form-control" name="Nom" id="nom" required></div>
                    <div class="col">  
                    <label >Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required></div>
                    <div class="col">
                    <label >CIN</label>
                    <input type="text" class="form-control" name="cin" id="cin" required>
                   </div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Date de naissance</label>
                    <input type="date" class="form-control" name="dateN" required></div>
                    <div class="col"> 
                    <label>lieu</label>
                    <input type="text" class="form-control" name="lieu" required></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Adresse</label>
                    <input type="text" class="form-control" name="adresse"></div>
                    
                      <div class="col"> 
                    <label>Niveau d'étude</label>
                    <input type="text" class="form-control" name="etude" id="etude" required>
                  <span id="error_niveau"></span></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Tel</label>
                    <input type="tel" class="form-control" name="tel" id="tel" required>
                  <span id="error"> </span>  </div>
                    
                      <div class="col"> 
                    <label>Etablissement</label>
                    <input type="text" class="form-control" name="etablissement" required ></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Organisme d'accueil</label>
                    <input type="text" class="form-control" name="organisme" required></div>
                    
                      <div class="col"> 
                    <label>Type de stage</label>
                    <input type="text" class="form-control" name="type" id="type" required></div></div>

                    <label>Sujet du stage</label>
                    <textarea class="form-control" name="sujet"  required> </textarea><br>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Periode de stage du </label>
                    <input type="date" class="form-control" name="dateD" required></div>
                    
                      <div class="col"> 
                    <label>au </label>
                    <input type="date" class="form-control" name="dateF" required></div></div>
                    <label class="form-input-label">stage payée</label><br>
                    <div class="row g-3">
                      <div class="col"> 
                    
                    Oui <input type="radio" class="form-check-input" name="payement" value="Oui"></div>
                    
                      <div class="col"> 
                    Non <input type="radio" class="form-check-input" name="payement" value="Non" ></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Montant de prime en cas de stage payé :</label>
                    <input type="text" class="form-control" name="montant" id="montant">
                  <span id="error_mont"></span></div>
                    
                      <div class="col"> 
                    <label>L'encadrant:</label>
                    <input type="text" class="form-control" name="encadrant" id="encadrant" required>
                    <span id="error_enc"> </span> <br></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                        <button class="btn btn-primary" type="submit" name="ok" >Envoyer</button></div></div>
                    
                    
                </form>

              </div>
          </div></div>
          
  

          <script src="verification.js">

    </script>
    
    </body>
</html>