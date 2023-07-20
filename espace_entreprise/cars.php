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
    <title>Voitures | Dashboard</title>
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
    <?php include ('header.php');
     ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->

        <section class="middle">
           <div class="header" id="managementCars"><a href=""></a>
                <h1> Mes voitures </h1>
                <a href="create_car.php" ><button class="btn btn-primary d-flex align-items-center"> <div><span class="mr-2 material-symbols-outlined">
directions_car
</span>Nouvelle voiture</button></a></div>
            </div>
            
            <!-- CARDS -->
            <div class="cards home-cards cards-cars">
            <?php
include('config/env.php');



$query = $dbco->query("SELECT * FROM cars");
$cars = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($cars as $car) {
    ?>
<div class="card" style="background: url(./<?php echo $car['image'] ?>) no-repeat!important; background-size:cover!important;">
    <div><?php // onclick="location.href = 'edit_cars?id=<?php echo $car['id']'" ?>
    <div class="top">
        <div class="left">
            <h2><?php echo $car['name'] ?></h2>
        </div>
        <img src="assets/img/profile_picture.png" alt="" class="right">
    </div>
    <div class="middle mt-3">
        <button class="btn btn-light" style="cursor:initial;"><?php echo $car['price'] ?>€</button>
        <div class="right">
            <div class="symbols">
                <h5 class="text-light border-bottom border-opacity-50 border-danger p-1"  ><?php echo $car['kilometer'] ?> KM</h5>
            </div>
        </div>
    </div>
    <div class="bottom mt-5">

    </div>
    </div>
    <div class="bottom-button">
        
        <button type="button" onclick="openModal('carModal<?php echo $car['id'] ?>')" class="btn btn-primary" data-toggle="modal" data-target="#">Afficher les détails</button>
    
    </div>

<div class="modal-box">
<style>
    .list-group-item:first-child {
        border-top-left-radius: 0.25rem; 
     border-top-right-radius: 0.25rem; 
    }
      .modal-box .modal-dialog .modal-<?php echo $car['id'] ?>:before{
  content: "";
  background: url(<?php echo $car['image'] ?>);
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
<div class="modal fade" id="carModal<?php echo $car['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="overflow-y: initial !important;" role="document">
        <div class="modal-content modal-<?php echo $car['id'] ?>">
            <div class="modal-header">
                <button style="z-index: 3" onclick="closeModal('carModal<?php echo $car['id'] ?>')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body scrollable" style="max-height: 500px; overflow-y:auto; z-index: 0;">
                                <h3 class="title"> <?php echo $car['name'] ?></h2>
                                <div class="container">
                                <p class="description mt-5"><?php echo $car['description'] ?></p>
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center my-2 h2-setting">Options </h3>
            <ul class="list-group setting-ul mt-2">
                <?php $options = explode(',', $car['setting']); foreach ($options as $option) : ?>
                    <li class="list-group-item "><?php echo $option; ?></li><br>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
        <h2 class="text-center my-2 h2-setting">Équipements</h2>
            <ul class="list-group setting-ul mt-2">
                <?php $gears = explode(',', $car['gear']); foreach ($gears as $gear) : ?>
                    <li class="list-group-item"><?php echo $gear; ?></li><br>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
                               
                                <button onclick="window.location.href = 'edit_car.php?id=<?php echo $car['id'] ?>'" class="btn btn-light mr-5">Éditer</button>
                                <button onclick="confirmDelete(<?php echo $car['id'] ?>)" class="btn btn-danger submit">Supprimer</button>
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


  function redirectToGarageStatus() {
    var confirmation = confirm("Êtes-vous sûr de vouloir modifier le status du garage ?");
    if (confirmation) {
      window.location.href = "garage_status.php";
    }
  }
  
  function confirmDelete(id_car) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cette voiture ?")) {
    window.location.href = 'function_delete_car.php?id=' + id_car;
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