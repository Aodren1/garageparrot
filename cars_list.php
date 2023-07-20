<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Voiture - Garage V.Parrot</title>
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
$title = 'Voitures en vente';
include('sub_banner.php'); ?>

<!-- Sub Banner end -->

<!-- Featured car start -->
<div class="featured-car content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Option bar start -->
                <div class="option-bar clearfix">
                    <div class="sorting-options2">
                        <span class="sort">Trier par :</span>
                        <select class="selectpicker search-fields" name="default-order">
                            <option>Par Défaut</option>
                            <option>Prix Croissant</option>
                            <option>Prix Décroissant</option>
                            <option>Nouveautés</option>
                            <option>Anciens</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                <?php 

include ('espace_entreprise/config/env.php');

if (isset($_GET['select-year-car']))
{
    unset($_POST);
    $selectYear = $_GET['select-year-car'];
    $selectCarCondition = $_GET['select-car_condition-car'];
    $selectType = $_GET['select-type-car'];
    $selectMinPrice = $_GET['min_price'];
    $selectMaxPrice = $_GET['max_price'];
    $query = $dbco->query("SELECT * FROM cars WHERE year = '$selectYear' AND car_condition = '$selectCarCondition' AND type = '$selectType'  AND price >= $selectMinPrice AND price <= $selectMaxPrice; ");
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);

} else if (isset($_GET['all']) && $_GET['all']== 'true') {
    $query = $dbco->query("SELECT * FROM cars");
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
}

$query = $dbco->query("SELECT MAX(price) AS max_price FROM cars");
$result = $query->fetch(PDO::FETCH_ASSOC);
$maxPrice = $result['max_price'];
if(isset($_POST['select-price']) && $_POST['select-year'] != 'all') {
    $selectPrice = $_POST['select-price'];
$selectYear = $_POST['select-year'];
$selectCarCondition = $_POST['select-car_condition'];
$selectType = $_POST['select-type'];
    $query = $dbco->query("SELECT * FROM cars WHERE price <= $selectPrice AND year = '$selectYear' AND car_condition = '$selectCarCondition' AND type = '$selectType'");
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
    
} elseif(isset($_POST['select-price']) && $_POST['select-year'] == 'all') 
{
    $selectPrice = $_POST['select-price'];
$selectCarCondition = $_POST['select-car_condition'];
$selectType = $_POST['select-type'];
$query = $dbco->query("SELECT * FROM cars WHERE price <= $selectPrice AND car_condition = '$selectCarCondition' AND type = '$selectType'");
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
} elseif (!isset($_GET['select-year-car'])) {
    $query = $dbco->query("SELECT * FROM cars");
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
}

foreach ($cars as $car) {
    
    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="car_details.php?id=<?php echo $car['id']; ?>" class="car-img">
                                    <div class="tag-2 bg-active"></div>
                                    <div class="price-box-2"><?php echo $car['price']; ?><span>€</span> </div>
                                    <img class="d-block w-100" src="espace_entreprise/<?php echo $car['image']; ?>" alt="car">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="car_details.php?id=<?php echo $car['id']; ?>"><?php echo $car['name']; ?></a>
                                </h1>
                                <div class="location">
                                    <a href="car_details.php?id=<?php echo $car['id']; ?>">
                                        <i class="flaticon-pin"></i><?php echo $adress ?>
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-way"></i> <?php echo $car['kilometer']; ?> km
                                    </li>
                                    <li>
                                        <i class="flaticon-calendar-1"></i> <?php echo $car['year']; ?>
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
                    <?php } ?>
                </div>
                <!-- Page navigation start -->
                <!-- <div class="pagination-box p-box-2 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="widget widget-3 advanced-search2">
                        <h3 class="sidebar-title">Chercher ma voiture</h3>
                        <form method="GET">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="select-type-car">
                                    <option value="Électrique">Électrique</option>
                                    <option value="Essence">Essence</option>
                                    <option value="Hybride">Hybride</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="select-year-car">
                                    <option value="2000">2000</option>
                                    <option value="2010">2010</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option selected value="2023">2023</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="select-car_condition-car">
                                    <option value="Neuf">Neuf</option>
                                        <option value="Presque neuf">Presque neuf</option>
                                        <option value="Occasion">Occasion</option>
                                </select>
                            </div>
                            <div class="range-slider clearfix">
                                <label>Prix</label>
                                <div data-min="0" data-max="<?php echo $maxPrice ?>"  data-min-name="min_price" data-max-name="max_price" data-unit="EUR" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-3">
                                <button class="search-button btn">Search</button>
                            </div>
                            </form>
                            <form method="GET"><div class="form-group mb-0">
                                <input hidden value="true" name="all">
                                <button class="search-button btn">Voir toutes les voitures</button>
                            </div></form>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured car end -->

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