<!DOCTYPE html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="stage";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
 $id=$_GET['id']; 
if (isset($_POST['ok'])) {


$nom = mysqli_real_escape_string($conn, $_POST['Nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$cin = mysqli_real_escape_string($conn, $_POST['cin']);
$dateN = mysqli_real_escape_string($conn, $_POST['dateN']);
$lieu = mysqli_real_escape_string($conn, $_POST['lieu']);
$adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
$etude = mysqli_real_escape_string($conn, $_POST['etude']);
$tel = mysqli_real_escape_string($conn, $_POST['tel']);
$etab = mysqli_real_escape_string($conn, $_POST['etablissement']);
$org = mysqli_real_escape_string($conn, $_POST['organisme']);
$typeS = mysqli_real_escape_string($conn, $_POST['type']);
$sujet = mysqli_real_escape_string($conn, $_POST['sujet']);
$dateD = mysqli_real_escape_string($conn, $_POST['dateD']);
$dateF = mysqli_real_escape_string($conn, $_POST['dateF']);
$paye = isset($_POST['payement']) ? mysqli_real_escape_string($conn, $_POST['payement']) : '';
$mont = mysqli_real_escape_string($conn, $_POST['montant']);
$encadrent = mysqli_real_escape_string($conn, $_POST['encadrant']);

$sql = "UPDATE `stagiaire` SET `nom`='$nom', `prenom`='$prenom', `cin`='$cin', `dateN`='$dateN', `lieu`='$lieu', `etude`='$etude', `adresse`='$adresse', `tel`='$tel', `etab`='$etab', `org`='$org', `typeS`='$typeS', `sujet`='$sujet', `dateD`='$dateD', `dateF`='$dateF', `paye`='$paye', `mont`='$mont', `encadrent`='$encadrent' WHERE id=$id";



$result=mysqli_query($conn,$sql);
if($result){
    header("Location:liste.php");
}
else{
    echo "Failed:".mysqli_error($conn);
}}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
      
      <title>Modifier</title>
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
                <h1>Modifier les informations </h1><br><br>
                <?php
                $sql="SELECT *FROM stagiaire WHERE id=$id LIMIT 1";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);?>
                <form class="needs-validation" novalidate method="POST"  id="myform" >
                    
                  <div class="row g-3">
                    <div class="col">  
                    <label >Nom</label>
                    <input type="text" class="form-control" name="Nom" id="nom" value="<?php echo $row['nom'];?>"></div>
                    <div class="col">  
                    <label >Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $row['prenom'];?>"></div>
                    <div class="col">
                    <label >CIN</label>
                    <input type="text" class="form-control" name="cin" id="cin" value="<?php echo $row['cin'];?>">
                   </div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Date de naissance</label>
                    <input type="date" class="form-control" name="dateN" value="<?php echo $row['dateN'];?>"></div>
                    <div class="col"> 
                    <label>lieu</label>
                    <input type="text" class="form-control" name="lieu" value="<?php echo $row['lieu'];?>"></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Adresse</label>
                    <input type="text" class="form-control" name="adresse" value="<?php echo $row['adresse'];?>"></div>
                    
                      <div class="col"> 
                    <label>Niveau d'étude</label>
                    <input type="text" class="form-control" name="etude" id="etude" value="<?php echo $row['etude'];?>">
                  <span id="error_niveau"></span></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Tel</label>
                    <input type="tel" class="form-control" name="tel" id="tel" value="<?php echo $row['tel'];?>">
                  <span id="error"> </span>  </div>
                    
                      <div class="col"> 
                    <label>Etablissement</label>
                    <input type="text" class="form-control" name="etablissement" value="<?php echo $row['etab'];?>"></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Organisme d'accueil</label>
                    <input type="text" class="form-control" name="organisme" value="<?php echo $row['org'];?>"></div>
                    
                      <div class="col"> 
                    <label>Type de stage</label>
                    <input type="text" class="form-control" name="type" id="type" value="<?php echo $row['typeS'];?>"></div></div>

                    <label>Sujet du stage</label>
                    <textarea class="form-control" name="sujet" ><?php echo $row['sujet'];?> </textarea><br>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Periode de stage du </label>
                    <input type="date" class="form-control" name="dateD" value="<?php echo $row['dateD'];?>"></div>
                    
                      <div class="col"> 
                    <label>au </label>
                    <input type="date" class="form-control" name="dateF" value="<?php echo $row['dateF'];?>"></div></div>
                    <label class="form-input-label">stage payée</label><br>
                    <div class="row g-3">
                      <div class="col"> 
                    
                    Oui <input type="radio" class="form-check-input" name="payement" value="Oui" <?php echo($row['paye']=='Oui')?"checked":"";?>></div>
                    
                      <div class="col"> 
                    Non <input type="radio" class="form-check-input" name="payement" value="Non" <?php echo($row['paye']=='Non')?"checked":"";?>></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                    <label>Montant de prime en cas de stage payé :</label>
                    <input type="text" class="form-control" name="montant" id="montant" value="<?php echo $row['mont'];?>">
                  <span id="error_mont"></span></div>
                    
                      <div class="col"> 
                    <label>L'encadrant:</label>
                    <input type="text" class="form-control" name="encadrant" id="encadrant" value="<?php echo $row['encadrent'];?>">
                    <span id="error_enc"> </span> <br></div></div>
                    <div class="row g-3">
                      <div class="col"> 
                        <button class="btn btn-primary" type="submit" name="ok" >Modifier</button>
                        
                        <button type="button" class="btn btn-secondary" ><a href="liste.php" class="link-dark" style="text-decoration:none;">Fermer</a></button></div>
                    
                    
                </form>

              </div>
          </div></div>
          
  

          <script src="verification.js">

    </script>
    
    </body>
</html>