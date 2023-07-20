<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="img/logos/logo.png" alt="sidebarlogo">
        </div>
        <div class="sidebar-navigation">
        <div class="status-nav status-garage status-garage<?php echo $open['status']?>"><a><?php echo $open['name']?></a></div>
            <h3 class="heading">Pages</h3>
            <ul class="menu-list">
                <li><a href="index.php" class="active pt0">Accueil </a>
                </li>
                <li>
                    <a href="cars_list.php">Voitures </a>
                        </li>
                        <li>
                            <a href="services.php">Services </a>
                        </li>
                        <li>
                            <a href="about.php">À propos </a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="login.html" class="nav-link h-icon">Espace entrprise 
                        <i class="flaticon-logout"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="get-in-touch">
            <h3 class="heading">Nous contacter</h3>
            <div class="get-in-touch-box d-flex">
                <i class="flaticon-phone"></i>
                <div class="detail">
                    <a href="tel:06XXXXXXXX"><?php echo $phone ?></a>
                </div>
            </div>
            <div class="get-in-touch-box d-flex">
                <i class="flaticon-mail"></i>
                <div class="detail">
                    <a href="#">v.parrot@garageparrot.fr</a>
                </div>
            </div>
        </div>
        <div class="get-social">
            <h3 class="heading">Nos Réseaux Sociaux</h3>
            <a href="#" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="instagram-bg">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="#" class="linkedin-bg">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>