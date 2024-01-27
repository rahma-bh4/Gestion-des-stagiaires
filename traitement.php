<?php
$servername = "localhost";
$username = "root";
try {
    $bdd = new PDO("mysql:host=$servername;dbname=stage", $username);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['ok'])) {
    $nom = $_POST['Nom']; 
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $dateN = $_POST['dateN'];
    $lieu = $_POST['lieu'];
    $adresse = $_POST['adresse'];
    $etude = $_POST['etude'];
    $tel = $_POST['tel'];
    $etab = $_POST['etablissement'];
    $org = $_POST['organisme'];
    $typeS = $_POST['type'];
    $sujet = $_POST['sujet'];
    $dateD = $_POST['dateD'];
    $dateF = $_POST['dateF'];
    $paye = isset($_POST['payement']) ? $_POST['payement'] : ''; // Utilisez "payement" au lieu de "paye"
    $mont = $_POST['montant'];
    $encadrent = $_POST['encadrant'];

    $requete = $bdd->prepare("INSERT INTO stagiaire VALUES(0,:nom,:prenom,:cin,:dateN,:lieu,:etude,:adresse,:tel,:etab,:org,:typeS,:sujet,:dateD,:dateF,:paye,:mont,:encadrent,0)");
    if ($requete->execute(array(
        "nom" => $nom,
        "prenom" => $prenom,
        "cin" => $cin,
        "dateN" => $dateN,
        "lieu" => $lieu,
        "etude" => $etude,
        "adresse" => $adresse,
        "tel" => $tel,
        "etab" => $etab,
        "org" => $org,
        "typeS" => $typeS,
        "sujet" => $sujet,
        "dateD" => $dateD,
        "dateF" => $dateF,
        "paye" => $paye,
        "mont" => $mont,
        "encadrent" => $encadrent
    ))) {
        header("Location: liste.php");
    } else {
        echo "Erreur lors de l'inscription";
    }
}else {
    echo "Erreur";
}
?>
