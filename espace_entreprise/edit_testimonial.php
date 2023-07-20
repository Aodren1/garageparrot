<?php
session_start();
if ($_SESSION['garage'] == true) {
    include('head.php');
        // include('function_timer.php');
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include('function_get_testimonial.php');
            $testimonial = getTestimonial($id);
        

    }
        // if (!isset($_SESSION['timer'])) {
        //     setTimer();
        // };
        // timer();
        

 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modération d'un avis | Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

</head>

<body>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->
<section>


            <?php
if (isset($_POST['name'])) {
    include_once('function_edit_testimonial.php');
    echo editTestimonial($id); 
    $testimonial = getTestimonial($id);
    unset($_POST); 

} 

            ?>
  <div class="container card-user-modif">
    <div class="header header-management mb-5">
      <h1 class="add-user-title main-title-page"><span style="font-size: 27px;" class="material-symbols-sharp">car_repair</span> <a>Modération de l'avis de <?php echo $testimonial['name'] ?></a></h1><br>
    </div><form class="form-custom" action="" name="create" method="POST" enctype="multipart/form-data">
        <div class="div-input-create-user"><button class="btn-primary btn input-create-user" type="submit" id='create_user' value=''><span class="mr-2 material-symbols-outlined">save</span>Sauvegarder</button></div>

        <label for="name">Nom</label><br>
        <input value="<?php echo $testimonial['name'] ?>" class="form-control" type="text" placeholder="Entrer le Nom Prénom" name="name" required><br><br>

        <label for="job">Poste / Statut</label><br>
        <input value="<?php echo ucfirst($testimonial['job']) ?>" class="form-control" type="text" placeholder="Entre le poste ou le statut de la personne" name="job" required><br><br>

        <label for="message">Message</label><br>
<textarea class="form-control" placeholder="Modifier l'avis" name="message"><?php echo $testimonial['message'] ?></textarea><br><br>

<select class="form-control" name="current" required>
  <option value="<?php echo $testimonial['current'] ?>" selected><?php echo ucfirst($testimonial['current']) ?></option>
  <?php  if( $testimonial['current'] == 'actif') $current = 'inactif'; else $current = 'actif'; ?>
  <option value="<?php echo $current ?>"><?php echo ucfirst($current)  ?></option>
</select>
        <!-- <div id="target" class="drag-drop-container">Zone pour le dépôt</div> -->
      </form>
    </div>
    <br>
</section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

</body>

</html>

<?php
} else
    header('Location: login.php');
?>
