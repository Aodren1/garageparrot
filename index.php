<!DOCTYPE html>
<html lang="fr">
<head>
    <title> Accueil - Garage V.Parrot</title>
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
<?php include('header.php') ?>
<!-- Main header end -->

<!-- Sidenav start -->
<?php include('sidenav.php'); ?>
<!-- Sidenav end -->

<!-- Banner start -->

<div class="banner" id="banner2">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner">
            <div class="carousel-item banner-max-height active item-bg">
                <img class="d-block w-100 h-100" src="img/car/drlow_modern_car_bmw_model_car_white_8k_a55a6236-ef24-4632-a983-496a3492b78f.png" alt="banner">
                <div class="carousel-content container banner-info bi-2">
                    <div class="text-center">
                        <h3 class="text-uppercase">Trouvez votre voiture idéale</h3>
                        <p>
                            Garage Parrot vous accompagne dans la recherche de votre voiture
                        </p>
                        <div class="inline-search-area">
                            <div class="row g-0">
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <form action="cars_list.php" method="POST">
                                    <select class="selectpicker search-fields" name="select-price">
                                        <option value="10000">> 10000€</option>
                                        <option value="30000">> 30000€</option>
                                        <option value="60000">> 60000€</option>
                                        <option value="90000">> 90000€</option>
                                        <option value="1000000000">< 90000€</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="selectpicker search-fields" name="select-year">


<option value="all">Toutes les années</option>
<option>2000</option>
<option>2010</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
<option>2023</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="selectpicker search-fields" name="select-car_condition">
                                        <option>Neuf</option>
                                        <option>Presque neuf</option>
                                        <option>Occasion</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="selectpicker search-fields" name="select-type">
                                        <option>Électrique</option>
                                        <option>Essence</option>
                                        <option>Hybride</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col sc2">
                                    <button type="submit" class="btn button-theme btn-search">
                                        <i class="fa fa-search"></i> <strong>Trouver</strong>
                                    </button>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->


<!-- Featured car start -->
<div class="featured-car content-area">
    <div class="container">
        <!-- Main title 3 -->
        <div class="main-title-3">
            <p>Voitures</p>
            <h1><span>Nouveautés</span></h1>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area clearfix">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <?php 
include ('espace_entreprise/config/env.php');
$query = $dbco->query("SELECT * FROM cars ORDER BY id DESC LIMIT 6");
$cars = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($cars as $car) {

                    ?>
            <div class="slick-slide-item">
                    <div class="car-box-4">
                        <div class="photo-overflow">
                            <div class="car-thumbnail-photo">
                                <img class="img-fluid w-100" src="espace_entreprise/<?php echo $car['image'] ?><" alt="photo">
                            </div>
                        </div>
                        <div class="for">Disponible</div>
                        <div class="ling-section">
                            <div class="lo-text clearfix">
                                <h3>
                                    <a href="car-details.php?id=<?php echo $car['id'] ?>"><?php echo $car['name'] ?></a>
                                </h3>
                                <h5><?php echo $car['price'] ?> €</h5>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-way"></i> <?php echo $car['kilometer'] ?> km
                                    </li>
                                    <li>
                                        <i class="flaticon-calendar-1"></i> <?php echo $car['year'] ?>
                                    </li>
                                    <li>
                                        <i class="flaticon-fuel"></i> <?php echo $car['type'] ?>
                                    </li>
                                    <li>
                                        <i class="flaticon-car"></i> <?php echo $car['car_condition'] ?>
                                    </li>
                                    <?php $options = explode(',', $car['setting'], 4); foreach ($options as $option) { ?>
                                    <li>
                                        <i class="flaticon-gear"></i> <?php echo $option ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Featured car end -->

<!-- advantages start -->
<div class="advantages content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title-3">
            <p>Nous sommes les meilleurs</p>
            <h1>Vos <span>Avantages</span></h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="advantages-4">
                    <div class="advantages-4-inner">
                        <div class="icon flaticon-console">
                            <i class="flaticon-shield"></i>
                        </div>
                        <div class="detail">
                            
<h4><a href="services.php">Hautement Sécurisé</a></h4>
<p>Chez nous, la protection de vos informations personnelles et de vos données est une priorité absolue. Nous nous engageons à maintenir un environnement hautement sécurisé pour vous offrir une tranquillité d'esprit totale lors de l'utilisation de nos services. Que vous soumettiez des informations personnelles, effectuiez des transactions en ligne ou interagissiez avec notre plateforme, vous pouvez avoir confiance en notre engagement envers la sécurité.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="advantages-4">
                    <div class="advantages-4-inner">
                        <div class="icon flaticon-console">
                            <i class="flaticon-money"></i>
                        </div>
                        <div class="detail">
                            <h4><a href="services.php">Des prix attrayants !</a></h4>
                            <p>Nous sommes là pour vous fournir les informations nécessaires concernant nos services et vous aider à trouver la meilleure solution correspondant à vos besoins. Notre équipe d'experts est dédiée à vous offrir un service de qualité dans le domaine de la vente de voitures. Nous comprenons l'importance de choisir le bon véhicule et le bon prix et nous sommes là pour vous guider tout au long du processus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="advantages-4">
                    <div class="advantages-4-inner">
                        <div class="icon flaticon-console">
                            <i class="flaticon-support-2"></i>
                        </div>
                        <div class="detail">
                            <h4><a href="services.php">Support Technique</a></h4>
                            <p>Bienvenue sur notre support technAll Rights Reservedique gratuit. Nous sommes là pour vous aider à résoudre les problèmes liés à votre véhicule et répondre à vos questions. Notre équipe d'experts est spécialisée dans tous les aspects de l'entretien et de la réparation automobile. Qu'il s'agisse de problèmes mécaniques, électriques ou de diagnostic, nous sommes là pour vous accompagner.</p>                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <a href="services.php" class="btn-6">En Savoir +</a>
            </div>
        </div>
    </div>
</div>
<!-- advantages end -->

<!-- Testimonial 3 start -->

<?php 
include ('espace_entreprise/config/env.php');
$query = $dbco->query("SELECT * FROM testimonials WHERE current = 'actif' ORDER BY id DESC LIMIT 5");
$testimonials = $query->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
$j = -1;
$active ="active";
$true = "true";
?>
<div class="testimonial-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="testimonial-inner">
                    <div class="main-title">
                        <h2>La satifaction client est notre priorité</h2>
                    </div>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach ($testimonials as $testimonial) {
                                $i ++;
                                $j++;
                            ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $j ?>" class="<?php echo $active ?>" aria-current="<?php echo $true ?>" aria-label="Slide <?php echo $i ?>"></button>
                            <?php 
                            $true = "";
                            $active = "";
                        }
                            ?>
                        </div>
                        <div class="carousel-inner">
                        <?php 
                        
                        $active ="active";
                        foreach ($testimonials as $testimonial) { ?>
                            <div class="carousel-item <?php echo $active ?>">
                                <p>
                                <?php echo $testimonial['message'] ?>                                </p>
                                <h5><strong><?php echo $testimonial['name'] ?></strong> <?php echo ucfirst($testimonial['job']) ?></h5>
                            </div>
                            <?php 
                            $active = "";
                        } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <form action="testimonial.php" method=""><div class="form-group mb-0">
                                <input hidden value="true" name="all">
                                <button style="width: auto!important;" class="search-button btn">Donner mon avis 👋🏻</button>
                            </div></form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Partners strat -->
<!-- <div class="partners">
    <div class="container">
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                <div class="slick-slide-item"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
            </div>
        </div>
    </div>
</div> -->
<!-- Partners end -->

<!-- Footer start -->
<?php include('footer.php') ?>
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
