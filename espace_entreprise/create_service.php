<?php
session_start();
include('head.php');
if ($_SESSION['garage'] == true ) {

?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Création d'un service| Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
<?php if(isset($_POST['title']))
{
    include_once('function_set_service.php');
    echo setService();

} ?>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->
        <section>
  <div class="container card-user-modif">
    <div class="header header-management mb-5">
      <h1 class="add-user-title main-title-page"><span style="font-size: 27px;" class="material-symbols-sharp">design_services</span> <a>Ajout d'un service</a></h1><br>
    </div><form class="form-custom" action="" name="create" method="POST" enctype="multipart/form-data">
        <div class="div-input-create-user"><button class="btn-primary btn input-create-user" type="submit" id='create_user' value=''><span class="mr-2 material-symbols-outlined">save</span>Sauvegarder</button></div>

        <label for="title">Nom</label><br>
        <input class="form-control" type="text" placeholder="Entrer le nom" name="title" required><br><br>



        <label for="description">Description 1</label><br>
<textarea required class="form-control" placeholder="Entrer la description" name="description1" >Il n'y a pas encore de description pour ce service..</textarea><br><br>
<label for="description">Description 2</label><br>
<textarea class="form-control" placeholder="Entrer la 2ème description (facultatif)" name="description2" ></textarea><br><br>
<label for="description">Description 3</label><br>
<textarea class="form-control" placeholder="Entrer la 3ème description (facultatif)" name="description3" ></textarea><br><br>

<label for="icone">Icône</label>
        <select id="icon" name="icon" required>
            <option value="" selected disabled>Choisissez une icône</option>
            <option value="flaticon-way">Chemin</option>
            <option value="flaticon-road">Route</option>
            <option value="flaticon-manual-transmission">Transmission manuelle</option>
            <option value="flaticon-calendar">Calendrier</option>
            <option value="flaticon-calendar-1">Calendrier 1</option>
            <option value="flaticon-fuel">Carburant</option>
            <option value="flaticon-car">Voiture</option>
            <option value="flaticon-car-1">Voiture 1</option>
            <option value="flaticon-gear">Engrenage</option>
            <option value="flaticon-pin">Épingle</option>
            <option value="flaticon-comment">Commentaire</option>
            <option value="flaticon-blog">Blog</option>
            <option value="flaticon-mail">Courrier</option>
            <option value="flaticon-mail-1">Courrier 1</option>
            <option value="flaticon-fax">Fax</option>
            <option value="flaticon-shield">Bouclier</option>
            <option value="flaticon-lock">Verrou</option>
            <option value="flaticon-agreement">Accord</option>
            <option value="flaticon-deal">Accord 1</option>
            <option value="flaticon-money">Argent</option>
            <option value="flaticon-support">Support</option>
            <option value="flaticon-support-1">Support 1</option>
            <option value="flaticon-support-2">Support 2</option>
            <option value="flaticon-phone">Téléphone</option>
            <option value="flaticon-earth">Terre</option>
            <option value="flaticon-user">Utilisateur</option>
            <option value="flaticon-user-1">Utilisateur 1</option>
            <option value="flaticon-award">Récompense</option>
            <option value="flaticon-medal">Médaille</option>
            <option value="flaticon-cup">Coupe</option>
            <option value="flaticon-wheel">Roue</option>
            <option value="flaticon-air-conditioner">Climatiseur</option>
            <option value="flaticon-speed">Vitesse</option>
            <option value="flaticon-car-2">Voiture 2</option>
            <option value="flaticon-motor">Moteur</option>
        </select><br><br>

<label for="link">Lien (facultatif)</label><br>
        <input class="form-control" type="text" placeholder="Si vous avez une page/article en lien avec" name="link"><br><br>

        <label for="image">Image (facultatif)</label><br>
        <input class="form-control" type="file" name="image" id="image-upload"><br><br>

        <!-- <div id="target" class="drag-drop-container">Zone pour le dépôt</div> -->
      </form>
    </div>
    <br>
</section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <script>
    function dragstart_handler(ev) {
  ev.dataTransfer.setData("text/plain", ev.target.id);
  ev.dataTransfer.dropEffect = "move";
}

function dragover_handler(ev) {
  ev.preventDefault();
  ev.target.classList.add("hover");
}

function drop_handler(ev) {
  ev.preventDefault();
  ev.target.classList.remove("hover");

  // Récupérer les fichiers déposés
  var files = ev.dataTransfer.files;

  var filenames = "";
  for (var i = 0; i < files.length; i++) {
    filenames += files[i].name + "<br>";
  }
  document.getElementById("target").innerHTML = "Fichiers déposés :<br>" + filenames;
}

document.addEventListener("DOMContentLoaded", function() {
  var target = document.getElementById("target");

  target.addEventListener("dragover", dragover_handler);
  target.addEventListener("drop", drop_handler);
});
  </script>
</body>

</html>
<?php

} else
    header('Location: login.php');