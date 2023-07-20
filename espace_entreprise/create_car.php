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
    <title> Création d'une voiture | Administrateurs</title>
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
<?php if(isset($_POST['name']))
{
    include_once('function_set_car.php');
    echo setCar();

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
      <h1 class="add-user-title main-title-page"><span style="font-size: 27px;" class="material-symbols-sharp">no_crash</span> <a>Ajout d'une voiture</a></h1><br>
    </div><form class="form-custom" action="" name="create" method="POST" enctype="multipart/form-data">
        <div class="div-input-create-user"><button class="btn-primary btn input-create-user" type="submit" id='create_user' value=''><span class="mr-2 material-symbols-outlined">save</span>Sauvegarder</button></div>

        <label for="name">Nom</label><br>
        <input class="form-control" type="text" placeholder="Entrer le nom" name="name" required><br><br>

        <label for="year">Année de conception</label><br>
        <input class="form-control" type="text" placeholder="Entrer l'année ex: 2020" name="year" required><br><br>

        <label for="price">Prix</label><br>
        <input class="form-control" type="text" placeholder="Entrer le prix ex: 2000" name="price" required><br><br>

        <label for="kilometers">Kilomètres</label><br>
        <input class="form-control" type="text" placeholder="Entrer les kilomètres ex: 200500" name="kilometers" required><br><br>
        <select class="form-control" name="type" required>
  <option value="" disabled selected>Choisir un type</option>
  <option value="Électrique">Électrique</option>
  <option value="Essence">Essence</option>
  <option value="Hybride">Hybride</option>
</select><br><br>
<select class="form-control" name="condition" required>
  <option value="" disabled selected>État du véhicule</option>
  <option value="Neuf">Neuf</option>
  <option value="Presque neuf">Presque neuf</option>
  <option value="Occasion">Occasion</option>
</select>
<label for="setting">Options</label><br>
        <div class="list-input">
        <input class="ml-3" type="checkbox" name="setting1" value="Phares bleu"> <span>Phares bleu</span>
        <input class="ml-3" type="checkbox" name="setting2" value="Vitre teintées"> <span>Vitre teintées</span>
        <input class="ml-3" type="checkbox" name="setting3" value="Climatisation"> <span>Climatisation</span>
        <input class="ml-3" type="checkbox" name="setting4" value="Moteur +"> <span>Moteur +</span>
        <input class="ml-3" type="checkbox" name="setting5" value="Écran de contrôle"> <span style="border-right: none!important;">Écran de contrôle</span>
        </div>
        <br><br>

        <label class="text-align-center" for="equipment">Équipement</label><br>
        <div class="list-input my-2">
        <input class="ml-3" type="checkbox" name="gear1" value="Pneux Neige"> <span>Pneux Neige</span>
        <input class="ml-3" type="checkbox" name="gear2" value="Roue de secours"> <span>Roue de secours</span>
        <input class="ml-3" type="checkbox" name="gear3" value="Allume-cigare"> <span>Allume-cigare</span>
        <input class="ml-3" type="checkbox" name="gear4" value="Sens bon"> <span style="border-right: none!important;">Sens bon</span>
        </div>
        <br>
        <label for="description">Description</label><br>
<textarea class="form-control" placeholder="Entrer la description" name="description" >Il n'y a pas de description pour le moment..</textarea><br><br>


        <label for="image">Image</label><br>
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