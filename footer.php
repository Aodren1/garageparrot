<footer class="main-footer-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="logo-image">
                    <a href="#"><img src="img/logos/logo.png" alt="logo" class="f-logo"></a>
                </div> -->
                <div class="schedules-footer my-4">
              <?php  include ('espace_entreprise/config/env.php');
$query = $dbco->query("SELECT * FROM schedules WHERE current = 'true'");
$schedules = $query->fetch(PDO::FETCH_ASSOC);


?><div>
<?php
$days = array(
    'monday' => 'Lundi',
    'tuesday' => 'Mardi',
    'wednesday' => 'Mercredi',
    'thursday' => 'Jeudi',
    'friday' => 'Vendredi',
    'saturday' => 'Samedi',
    'sunday' => 'Dimanche'
);

foreach ($days as $day => $frenchDay) {
    echo "<div class='d-flex mt-2'>";
    echo "<h5 class='mx-2'>" . $frenchDay . ' : </h5>';
    echo '<p>' . date('H:i', strtotime($schedules[$day.'_mor_start'])) . ' - ' . date('H:i', strtotime($schedules[$day.'_mor_end'])) . ' / ' . date('H:i', strtotime($schedules[$day.'_eve_start'])) . ' - ' . date('H:i', strtotime($schedules[$day.'_eve_end'])) . '</p>';
    echo '</div>';
}
?></div>

                </div>
                <div class="footer-menu">
                    <ul>
                        <li class="li">
                            <a href="index.php">Accueil</a>
                        </li>
                        <li class="li">
                            <a href="cars_list.php">Voiture</a>
                        </li>
                        <li class="li">
                            <a href="services.php">Services</a>
                        </li>
                        <li class="li">
                            <a href="about.php">À Propos</a>
                        </li>
                        <li class="li">
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p> ©  2023 <a href="http://portfolio.aodren-dev.com" target="_blank">Aodren Floride</a>. Tout les droits réservés.</p>
                </div>
            </div>
        </div>
    </div>
</footer>