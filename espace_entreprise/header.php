<!-- Le header du garage -->
<script>$(document).ready(function() {
  $('.btn-dark-mobile').click(function() {
    $('.mobile-menu').toggleClass('active');
  });
  $('.btn-dark-computer').click(function() {
    $('.computer-menu').toggleClass('active');

  });

});
</script>

    <nav class=" nav-computer" style=" z-index: 10;">
        <div class="container navbar-cm">
        <a href="compagny_index.php"><div class="img-logo"><img src="assets/img/logo_nav.png" class="logo"></div></a>

    <div> <button class="btn btn-dark btn-dark-computer"><span class="material-symbols-outlined">menu</span></button></div>
    <div class="flex-column mobile-menu computer-menu p-3">
  <button class="btn btn-dark btn-dark-mobile mt-2"><span class="material-symbols-outlined">menu_open</span></button>
  <div class="img-logo my-3"><img src="assets/img/logo_nav.png" class="logo"></div>
  <ul>
    <li class="mx-3">
      <a class="a-menu no-border-top" href="compagny_index.php">Accueil</a>
    </li>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a class="a-menu" href="services.php">Services</a>
    </li>
                <?php } ?>
    <li class="mx-3">
      <a class="a-menu" href="cars.php">Voitures</a>
    </li>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a class="a-menu" href="schedules.php">Horaires</a>
    </li>
                <?php } ?>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a class="a-menu" href="management_employees.php">Employés</a>
    </li>
    <?php } ?>
    <li class="mx-3">
      <a class="a-menu" href="testimonials.php">Témoignages</a>
    </li>
    </ul>
    <div class="mt-auto">
<a class="align-item-center d-flex text-primary" href="logout.php"> Se déconnecter     <span class="material-symbols-sharp ml-2 text-primary" style="font-size:21px">logout</span> </a>
    </div>
    <div class="mt-auto none">
         <span style="color: var(--color-white);">Contactez nous</span>
         <ul>
            <li class="mx-3 ml-5 span-star-computer"><span class="material-symbols-outlined">star</span><a class="no-border-top" href="" target="_blank"> 3 Rue du Mas, 92330 Sceaux</a></li>
            <li class="mx-3 ml-5 span-star-computer"><span class="material-symbols-outlined">star</span> <a class="no-border-top" href="tel:+334XXXXXXXX">  04 XX XX XX XX</a></li>
            <li class="mx-3 ml-5 span-star-computer"><span class="material-symbols-outlined">star</span> <a class="no-border-top" href="mailto:v.parrot@garageparrot.fr"><?php echo $mail ?></a></li>
         </ul>
      </div>
                  </div>

                
            </div>
    </nav>
    <nav class="nav-mobile" style=" z-index: 10;">
        <div class="container navbar-cm mobile-nav">
            <a href=""></a>
            <div class="img-logo"><img src="assets/img/logo_nav.png" class="logo"></div>
            <button class="btn btn-dark btn-dark-mobile"><span class="material-symbols-outlined">menu</span></button>
  <div class="mobile-menu flex-column p-3">
  <button class="btn btn-dark btn-dark-mobile mt-2"><span class="material-symbols-outlined">menu_open</span></button>
  <div class="img-logo my-3"><img src="assets/img/logo_nav.png" class="logo"></div>
  <ul>
    <li class="mx-3">
      <a class="no-border-top" href="compagny_index.php">Accueil</a>
    </li>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a href="services.php">Services</a>
    </li>
    <?php } ?>
    <li class="mx-3">
      <a href="cars.php">Voitures</a>
    </li>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a href="schedules.php">Horaires</a>
    </li>
    <?php } ?>
<?php if($_SESSION['garage_role'] == 'admin') { ?>    
    <li class="mx-3">
      <a href="management_employees.php">Employés</a>
    </li>
    <?php } ?>
    <li class="mx-3">
      <a href="testimonials.php">Témoignages</a>
    </li>
    </ul>
    <div class="mt-auto">
     <span class="material-symbols-sharp" style="color: #e23232;">logout</span> 
    </div>
    <div class="none mt-auto">
         <span style="color: var(--color-white);">Contactez nous</span>
         <ul>
            <li class="mx-3 ml-5 span-star"><span class="material-symbols-outlined">star</span><a class="no-border-top" href="" target="_blank"> 3 Rue du Mas, 92330 Sceaux</a></li>
            <li class="mx-3 ml-5 span-star"><span class="material-symbols-outlined">star</span> <a class="no-border-top" href="tel:+334XXXXXXXX">  04 XX XX XX XX</a></li>
            <li class="mx-3 ml-5 span-star"><span class="material-symbols-outlined">star</span> <a class="no-border-top" href="mailto:v.parrot@garageparrot.fr"><?php echo $mail ?></a></li>
         </ul>
      </div>
                  </div>
  

            </div>
    </nav>
