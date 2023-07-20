<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Voiture détails - Garage V.Parrot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/lightbox.min.css">
    <link rel="stylesheet" type="text/css"  href="css/jnoty.css">
    <link rel="stylesheet" type="text/css"  href="css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/initial.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/midnight-blue.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=OSans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
<div class="page_loader"></div>
<!-- Main header start -->
<?php include('header.php'); ?>

<!-- Main header end -->

<!-- Sidenav start -->
<?php include('sidenav.php'); ?>

<!-- Sidenav end -->

<!-- Sub banner start -->
<?php
$title = 'Voiture';
include('sub_banner.php'); ?>

<!-- Sub Banner end -->

<!-- Car details page start -->
<?php         if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include('espace_entreprise/function_get_car.php');
            $car = getCar($id);
}

?>

<div class="car-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="car-details-section">
                    <div class="heading-car-3 clearfix">
                        <div class="pull-left">
                            <h3><?php echo $car['name'] ?></h3>
                            <p>
                                <i class="flaticon-pin"></i> <?php echo $adress ?>
                            </p>
                        </div>
                        <div class="pull-right">
                            <h3><?php echo $car['price'] ?>€</h3>
                        </div>
                    </div>
                    <!-- Cardetailsslider 3 start -->
                    <div class="cardetailsslider-3 clearfix mb-30">
                        <div class="product-img-slide">
                            <div class="slider-for">
                                <img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid w-100" alt="slider-car">
                                <img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid w-100" alt="slider-car">
                                <img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid w-100" alt="slider-car">
                                <img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid w-100" alt="slider-car">
                                <img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid w-100" alt="slider-car">
                            </div>
                            <div class="slider-nav">
                                <div class="thumb-slide"><img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid" alt="small-car"></div>
                                <div class="thumb-slide"><img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid" alt="small-car"></div>
                                <div class="thumb-slide"><img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid" alt="small-car"></div>
                                <div class="thumb-slide"><img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid" alt="small-car"></div>
                                <div class="thumb-slide"><img src="espace_entreprise/<?php echo $car['image'] ?>" class="img-fluid" alt="small-car"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Advanced search start -->
                    <?php $cmpt = explode(',', $car['gear']); foreach ($cmpt as $gear) { $j++; } if(!isset($j)) $j = 0; ?>
                    <div class="widget-2 advanced-search bg-grea-2 d-lg-none d-xl-none">
                        <h3 class="sidebar-title">Réserver cette voiture</h3>
                        <ul>
                        <li>
                                <span>Nom</span><?php echo $car['name'] ?>
                            </li>
                            <li>
                                <span>Année</span><?php echo $car['year'] ?>
                            </li>
                            <li>
                                <span>État</span><?php echo $car['car_condition'] ?>
                            </li>
                            <li>
                                <span>Kilométrage</span><?php echo $car['kilometer'] ?>
                            </li>
                            <li>
                                <span>Nb. d'équipements</span><?php echo $j ?>
                            </li>
                            <li>
                                <span>Type</span><?php echo $car['type'] ?>
                            </li>
                        </ul>
                    </div>
                    <!-- Description start -->
                    <div class="Description mb-50">
                        <h3 class="heading-2">Description</h3>
                        <p><?php echo $car['description'] ?></p>
                    </div>
                    <!-- Car amenities start -->
                    <div class="car-amenities mb-40">
                        <h3 class="heading-2">Options</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="amenities">
                                <?php $options = explode(',', $car['setting']); foreach ($options as $option) { ?>
                                    <li>
                                        <i class="fa fa-check"></i><?php echo $option ?>
                                    </li> <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="amenities">
                                <?php $gears = explode(',', $car['gear']); foreach ($gears as $gear) { $i++; ?>
                                    <li>
                                        <i class="fa fa-check"></i><?php echo $gear ?>
                                    </li> <?php } if(!isset($i)) $i = 0; ?>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="widget advanced-search d-none d-xl-block d-lg-block">
                        <h3 class="sidebar-title">Réserver cette voiture </h3>
                        <ul>
                            <li>
                                <span>Nom</span><?php echo $car['name'] ?>
                            </li>
                            <li>
                                <span>Année</span><?php echo $car['year'] ?>
                            </li>
                            <li>
                                <span>État</span><?php echo $car['car_condition'] ?>
                            </li>
                            <li>
                                <span>Kilométrage</span><?php echo $car['kilometer'] ?>
                            </li>
                            <li>
                                <span>Nb. d'équipements</span><?php echo $i ?>
                            </li>
                            <li>
                                <span>Type</span><?php echo $car['type'] ?>
                            </li>
                        </ul>
                    <a href="tel:06XXXXXXXX"><button class="btn btn-call mt-3">Appeler</button></a>

                    </div>
                    
    </div>
</div>
        </div>
    </div>
</div>
<!-- Contact 1 start -->
<div class="contact-1 content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1 class="mb-10">Contact</h1>
            <div class="title-border">
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
                <div class="title-border-inner"></div>
            </div>
        </div>
        <div class="bg-white">
            <div class="row g-0">
                <div class="col-lg-7 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact form start -->
                    <div class="contact-form contact-pad">
                        <h3>Contactez nous</h3>
                        <form id="contact_form" action="index.php" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="Nom Prénom" aria-label="Nom Prénom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group email">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="form-control" placeholder="Objet" aria-label="Objet">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="form-control" placeholder="Numéro de téléphone" aria-label="Numéro de téléphone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group message">
                                        <textarea  class="form-control" name="message" placeholder="Écrivez votre message" aria-label="Écrivez votre message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send-btn text-center">
                                        <button type="submit" class="btn-6">Envoyer un message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form end -->
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad2">
                    <!-- Contact details start -->
                    <div class="contact-details ">
                        <h3>Coordonnées</h3>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Adresse</h4>
                                <p><?php echo $adress ?></p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Téléphone</h4>
                                <p>
                                    <a href="tel:06XXXXXXXX"><?php echo $phone ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="ci-box d-flex">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Email</h4>
                                <p>
                                    <a href="mailto:v.parrot@garageparrot.fr"><?php echo $mail ?></a>
                                </p>
                            </div>
                        </div>
                        <h3>Suivez nous</h3>
                        <ul class="social-list clearfix">
                            <li>
                                <a href="#" class="facebook-bg">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="instagram-bg">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin-bg">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Contact details end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->

<!-- Footer start -->
<?php include('footer.php'); ?>
<!-- Footer end -->

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script  src="js/bootstrap-submenu.js"></script>
<script  src="js/rangeslider.js"></script>
<script  src="js/jquery.mb.YTPlayer.js"></script>
<script  src="js/bootstrap-select.min.js"></script>
<script  src="js/jquery.easing.1.3.js"></script>
<script  src="js/jquery.scrollUp.js"></script>
<script  src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="js/leaflet.js"></script>
<script  src="js/leaflet-providers.js"></script>
<script  src="js/leaflet.markercluster.js"></script>
<script  src="js/dropzone.js"></script>
<script  src="js/slick.min.js"></script>
<script  src="js/slick.min.js"></script>
<script  src="js/jquery.filterizr.js"></script>
<script  src="js/jquery.magnific-popup.min.js"></script>
<script  src="js/jquery.countdown.js"></script>
<script  src="js/jquery.mousewheel.min.js"></script>
<script  src="js/lightgallery-all.js"></script>
<script  src="js/jnoty.js"></script>
<script  src="js/maps.js"></script>
<script  src="js/sidebar.js"></script>
<script  src="js/app.js"></script>

</body>
</html>