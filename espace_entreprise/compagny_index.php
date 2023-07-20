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
    <title>Garage | Dashboard</title>
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
           <div class="header">
                <h1> Bonjour <?php echo $_SESSION['firstname'] . " 👋🏻";?></h1>
            </div>
            
            <!-- CARDS -->
            <div class="cards home-cards">
                <!-- CARD 01 -->
<?php if($_SESSION['garage_role'] == 'admin') { ?>    

                <div class="card home-index" onclick="location.href = 'services.php'"> 
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>SERVICES</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Ajouter de nouveaux service sur la page d'accueil</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">design_services</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- END OF CARD 01 -->
                <!-- CARD 02 -->
<?php if($_SESSION['garage_role'] == 'admin') { ?>    

                <div class="card home-index" onclick="location.href='schedules.php'">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>HORAIRES</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Modifier les horaires d'ouverture</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">manage_history</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- END OF CARD 02 -->
                <!-- CARD 03 -->
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
                <div class="card home-index" onclick="location.href='management_employees.php'"> 
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>EMPLOYÉS</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Gérer les employés</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">engineering</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 03 -->

                <?php } ?>
                <!-- CARD 04 -->
                <div onclick="location.href='cars.php'" class="card home-index"> 
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>VOITURES</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Gérer les voitures</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">directions_car</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 04 -->
                <!-- CARD 05 -->
                <div onclick="location.href='testimonials.php'" class="card home-index">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2>TÉMOIGNAGES</h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Gérer les témoignages</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">campaign</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD 05 -->
                <!-- CARD 06-->
<?php if($_SESSION['garage_role'] == 'admin') { ?>    

                <div onclick="redirectToGarageStatus()" class="home-index card <?php if( $_SESSION['garage_status'][2] == 0) echo 'garage-close'; else echo 'garage-open' ?>">
                    <div class="top">
                        <div class="left">
                            <h2>Accéder à cette Espace</h2>
                        </div>
                        <img src="assets/img/profile_picture.png" alt="" class="right">
                    </div>
                    <div class="middle">
                        <h2><?php echo $_SESSION['garage_status'][1] ?></h2>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <h5>Cliquer pour changer le statut</h5>
                        </div>
                        <div class="right">
                            <div class="symbols">
                                <span class="material-symbols-sharp">support</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- END OF CARD 06 -->
            </div>
            <!-- END OF CARDS -->
        </section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <!-- JS -->
    <script>
  function redirectToGarageStatus() {
    var confirmation = confirm("Êtes-vous sûr de vouloir modifier le status du garage ?");
    if (confirmation) {
      window.location.href = "garage_status.php";
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