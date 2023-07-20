<?php
session_start();
if ($_SESSION['garage'] == true) {
    include 'head.php';

// include('function_timer.php');
// if(!isset($_SESSION['timer']))
// {
//     setTimer();
// };
// timer();
      ?>
        <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../fonts/flaticon/font/flaticon.css">
   </head>

<body>
    <!-- NAVIGATION -->
    <?php include ('header.php');
     ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->

        <section class="middle">
           <div class="header" id="managementCars"><a href=""></a>
                <h1> Mes services </h1>
                <a href="create_service.php" ><button class="btn btn-primary d-flex align-items-center"> <div><span class="mr-2 material-symbols-outlined">
add_business
</span>Nouveau services</button></a></div>
            </div>
            
            <!-- CARDS -->
            <div class="cards home-cards cards-services">
            <?php
include ('config/env.php');



$query = $dbco->query("SELECT * FROM services");
$services = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($services as $service) {
    ?>


<div class="card card-services">
    
<div class="mb-5 top">

<img style="z-index: 10;" src="assets/img/profile_picture.png" alt="" class="right">
</div>
    <style>


    </style>
    <i class="flaticon-c <?php echo $service['icon'] ?>"></i>
    <h2 class="mt-5 title-services"><?php echo $service['title'] ?></h2>
    <div style="height: 200px; overflow: auto;" class="middle middle-services text-center justify-content-center my-2" >
    <div class="left">

        <p class="description services-p"><?php echo $service['description1'] ?></p><br><br>
        <p class="description services-p"><?php echo $service['description2'] ?></p><br><br>
        <p class="description services-p"><?php echo $service['description3'] ?></p>

        </div>
    </div>


    <div class="bottom-button">
        
        <button type="button" onclick="openModal('serviceModal<?php echo $service['id'] ?>')" class="btn btn-light" data-toggle="modal" data-target="#">Afficher les détails</button>
    
    </div>

<div class="modal-box">
<style>
    .list-group-item:first-child {
        border-top-left-radius: 0.25rem; 
     border-top-right-radius: 0.25rem; 
    }
      .modal-box .modal-dialog .modal-<?php echo $service['id'] ?>:before{
  content: "";
  background: url(<?php echo $service['image'] ?>);
  background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
  width: 100%;
  height: 120px;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 5px 5px 0 0;
  z-index: 2;
  }
</style>
<div class="modal fade" id="serviceModal<?php echo $service['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="overflow-y: initial !important;" role="document">
        <div class="modal-content modal-<?php echo $service['id'] ?>">
            <div class="modal-header" style="justify-content: center; background:var(--color-alternate-secondary)">
                <button style="z-index: 3" onclick="closeModal('serviceModal<?php echo $service['id'] ?>')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    <i class="flaticon-c <?php echo $service['icon'] ?>"></i>

            </div>
            <div class="modal-body scrollable" style="max-height: 500px; overflow-y:auto; z-index: 0;">
                                <h3 class="title"> <?php echo $service['title'] ?></h2>
                                <div class="container">
                                <p class="description mt-5"><?php echo $service['description1'] ?></p><br>
                                <p class="description mt-5"><?php echo $service['description2'] ?></p><br>
                                <p class="description mt-5"><?php echo $service['description3'] ?></p><br>
</div>
                               
                                <button onclick="window.location.href = 'edit_service.php?id=<?php echo $service['id'] ?>'" class="btn btn-light mr-5">Éditer</button>
                                <button onclick="confirmDelete(<?php echo $service['id'] ?>)" class="btn btn-danger submit">Supprimer</button>
            </div>

        </div>
</div>
    </div>
</div>
</div>
    <?php
}
?>
            <!-- END OF CARDS -->
        </section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script>
function openModal(modalId) {
  var modal = $('#' + modalId);

  modal.modal('show');
}

function closeModal(modalId) {
  var modal = $('#' + modalId);

  modal.modal('hide');
}

  
  function confirmDelete(id_service) {
  if (confirm("Êtes-vous sûr de vouloir supprimer ce service ?")) {
    window.location.href = 'function_delete_service.php?id=' + id_service;
  }
}

</script>



    <script defer src="./assets/js/all.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
    
<?php 
} else
    header('Location: login.php');   