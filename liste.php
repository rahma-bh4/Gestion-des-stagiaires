<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "stage");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $recherche = htmlspecialchars($_POST['search']);
    $allusers = $connection->query('SELECT * FROM stagiaire WHERE nom LIKE "%' . $recherche . '%" OR prenom LIKE "%' . $recherche . '%" OR typeS LIKE "%' . $recherche . '%" OR encadrent LIKE "%' . $recherche . '%"OR cin LIKE "%' . $recherche . '%" OR sujet LIKE "%' . $recherche . '%"');
} else {
    $query = "SELECT * FROM stagiaire";
    $allusers = mysqli_query($connection, $query);
}
if (isset($_POST['validate'])) {

    $stagiaire_id = mysqli_real_escape_string($connection, $_POST['stagiaire_id']);


    $valide = "validé";
    $sql = "UPDATE `stagiaire` SET `valide`='$valide' WHERE `id`='$stagiaire_id'";
    mysqli_query($connection, $sql);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Liste</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <header> <img class="navbar-brand logo" src="images/tunisiaflag.png"> Ministère des Technologies de la Communication et de l'économie numérique </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
        <div class="container-fluid"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarScroll"> <img class="navbar-brand logo" src="images/cnilogo.jpg">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
                    <li class="nav-item nav-link">Accueil</li>
                    <li class="nav-item nav-link">A propos de Nous</li>
                    <li class="nav-item nav-link">Prestations</li>
                    <li class="nav-item nav-link">Contact</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Liste des stagiaires</h3>
        </div>

        <div>

            <form class="d-flex" method="POST">
                <a href="inscription.php" class="btn btn-dark ajout">ajouter</a>
                <input type="search" placeholder="Rechercher" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>

            </form>
        </div>


        <?php if (!empty($_POST['search'])) : ?>
            <?php if (mysqli_num_rows($allusers) > 0) : ?>
                <table class="table table-hover table-borderred table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">CIN</th>
                            <th scope="col">Type de stage</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Encadrant</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($allusers)) : ?>
                            <tr>
                                <td scope="row"><?php echo $user['id']; ?></td>
                                <td><?php echo $user['nom']; ?></td>
                                <td><?php echo $user['prenom']; ?></td>
                                <td><?php echo $user['cin']; ?></td>
                                <td><?php echo $user['typeS']; ?></td>
                                <td><?php echo $user['tel']; ?></td>
                                <td><?php echo $user['encadrent']; ?></td>
                                <td class="d-flex flex-row">
                                    <a href="edit.php?id=<?php echo $user['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                    <a href="delete.php?id=<?php echo $user['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" onclick="supprimer()"></i></a>
                                    <button class="link-dark infoButton" data-bs-toggle="modal" data-bs-target="#modalContent" style="border:0px;background-color:transparent;" data-details="<?php echo htmlentities(json_encode($user)); ?>">
                                        <i class="fa-solid fa-circle-info fs-5"></i>
                                    </button>
                                    <form  method="POST">
                                        <input type="hidden" name="stagiaire_id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" name="validate" style="border:0px;background-color:transparent;" onclick="valider()"> <i class="fa-solid fa-circle-check fs-5" style="width: 20px;;height: 20px;"></i></i></button>
                                    </form>
                                    <?php
                                    if ($user['valide'] == 'validé') {
                                    ?>
                                        <a href="att_stage.php?id=<?php echo $user['id'] ?>"><i class="fa-solid fa-print fs-5" style="margin-top:0px;"></i></a>
                                    <?php } ?>


                                </td>
                            </tr>
                        <?php endwhile;

                        ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {

                                var buttons = document.querySelectorAll('.infoButton');
                                buttons.forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        // Clear the previous content of the modal
                                        document.getElementById('modalContentBody').innerHTML = '';

                                        // Retrieve the details from the button's data-details attribute
                                        var details = JSON.parse(button.getAttribute('data-details'));

                                        // Populate the modal with the data
                                        var modalContentBody = document.getElementById('modalContentBody');
                                        modalContentBody.innerHTML += '<p>Nom: ' + details.nom + '</p>';
                                        modalContentBody.innerHTML += '<p>Prenom: ' + details.prenom + '</p>';
                                        modalContentBody.innerHTML += '<p>CIN: ' + details.cin + '</p>';
                                        modalContentBody.innerHTML += '<p>Date de Naissance: ' + details.dateN + '</p>';
                                        modalContentBody.innerHTML += '<p>lieu: ' + details.lieu + '</p>';
                                        modalContentBody.innerHTML += '<p>Adresse: ' + details.adresse + '</p>';
                                        modalContentBody.innerHTML += "<p>niveau d'étude: " + details.etude + '</p>';
                                        modalContentBody.innerHTML += '<p>Telephone: ' + details.tel + '</p>';
                                        modalContentBody.innerHTML += '<p>Etablissement: ' + details.etab + '</p>';
                                        modalContentBody.innerHTML += "<p>Organisme d'accueil: " + details.org + '</p>';
                                        modalContentBody.innerHTML += '<p>Type de stage: ' + details.typeS + '</p>';
                                        modalContentBody.innerHTML += '<p>Sujet de Stage: ' + details.sujet + '</p>';
                                        modalContentBody.innerHTML += '<p>Periode de stage du: ' + details.dateD + '</p>';
                                        modalContentBody.innerHTML += '<p>au: ' + details.dateF + '</p>';
                                        modalContentBody.innerHTML += '<p>Montant de prime en cas de stage payée: ' + details.mont + '</p>';
                                        modalContentBody.innerHTML += '<p>Encadrant: ' + details.encadrent + '</p>';
                                    });
                                });
                            });
                        </script>

                        <div class="modal fade" id="modalContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Informations sur le stagiaire</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="modalContentBody">


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun stagiaire trouvé</p>
            <?php endif; ?>
        <?php else : ?>
            <table class="table table-hover table-borderred table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">CIN</th>
                        <th scope="col">Type de stage</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Encadrant</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM stagiaire";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("Query Failed: " . mysqli_error($connection));
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                            <tr>
                                <td scope="row"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['prenom']; ?></td>
                                <td><?php echo $row['cin']; ?></td>
                                <td><?php echo $row['typeS']; ?></td>
                                <td><?php echo $row['tel']; ?></td>
                                <td><?php echo $row['encadrent']; ?></td>
                                <td class="d-flex flex-row">
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3" ></i></a>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" onclick="supprimer()"></i></a>
                                    <button class="link-dark infoButton" data-bs-toggle="modal" data-bs-target="#modalContent" style="border:0px;background-color:transparent;" data-details=" <?php echo htmlentities(json_encode($row)); ?> ">
                                        <i class="fa-solid fa-circle-info fs-5"></i>
                                    </button>
                                    <form  method="POST">
                                        <input type="hidden" name="stagiaire_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="validate" style="border:0px;background-color:transparent;" onclick="valider()"><i class="fa-solid fa-circle-check fs-5" style="width:20px;height:20px;"></i></button>
                                    </form>
                                    <?php
                                    if ($row['valide'] == 'validé') {
                                    ?>
                                        <a href="att_stage.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-print fs-5" style="margin-top:0px;"></i></a>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php endwhile; ?>






                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Add click event listener to all buttons with class 'infoButton'
                                var buttons = document.querySelectorAll('.infoButton');
                                buttons.forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        // Clear the previous content of the modal
                                        document.getElementById('modalContentBody').innerHTML = '';

                                        // Retrieve the details from the button's data-details attribute
                                        var details = JSON.parse(button.getAttribute('data-details'));

                                        // Populate the modal with the data
                                        var modalContentBody = document.getElementById('modalContentBody');
                                        modalContentBody.innerHTML += '<p>Nom: ' + details.nom + '</p>';
                                        modalContentBody.innerHTML += '<p>Prenom: ' + details.prenom + '</p>';
                                        modalContentBody.innerHTML += '<p>CIN: ' + details.cin + '</p>';
                                        modalContentBody.innerHTML += '<p>Date de Naissance: ' + details.dateN + '</p>';
                                        modalContentBody.innerHTML += '<p>lieu: ' + details.lieu + '</p>';
                                        modalContentBody.innerHTML += '<p>Adresse: ' + details.adresse + '</p>';
                                        modalContentBody.innerHTML += '<p>niveau d étude: ' + details.etude + '</p>';
                                        modalContentBody.innerHTML += '<p>Telephone: ' + details.tel + '</p>';
                                        modalContentBody.innerHTML += '<p>Etablissement: ' + details.etab + '</p>';
                                        modalContentBody.innerHTML += '<p>Organisme d accueil: ' + details.org + '</p>';
                                        modalContentBody.innerHTML += '<p>Type de stage: ' + details.typeS + '</p>';
                                        modalContentBody.innerHTML += '<p>Sujet de Stage: ' + details.sujet + '</p>';
                                        modalContentBody.innerHTML += '<p>Periode de stage du: ' + details.dateD + '</p>';
                                        modalContentBody.innerHTML += '<p>au: ' + details.dateF + '</p>';
                                        modalContentBody.innerHTML += '<p>Montant de prime en cas de stage payée: ' + details.mont + '</p>';
                                        modalContentBody.innerHTML += '<p>encadrant: ' + details.encadrent + '</p>';
                                    });
                                });
                            });
                            function supprimer(){
                              alert("Vouleer vous vraiment suprimer ce stagiaire");
                            }
                            function valider(){
                              alert("Vouleer vous vraiment valider ce stage");
                            }
                        </script>

                        <div class="modal fade" id="modalContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Informations sur le stagiaire</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="modalContentBody">
                                        <!-- Content will be dynamically added here -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div><?php }
                        endif;
                                ?>
                </tbody>
            </table>






</body>

</html>