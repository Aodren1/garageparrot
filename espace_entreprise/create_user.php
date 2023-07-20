<?php
session_start();
include('head.php');
if ($_SESSION['garage'] == true ) {

?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Création d'utilisateur | Administrateurs</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
<?php if(isset($_POST['email']))
{
    include_once('function_hash.php');
      if (isset($_POST['email'])) {
      $email = $_POST['email'];
      }
      include_once('function_set_user.php');
      echo setUser();
} ?>
    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->
<section>
 
    <div class="container card-user-modif">
    <div class="header header-management mb-5">
                <h1 class="add-user-title main-title-page"><span style="font-size: 27px;" class=" material-symbols-sharp">person_add</span> <a>Ajout d'un Utilisateur</a></h1><br>
<form class="form-custom" action="" name="create" method="POST">
    <div class="div-input-create-user"><button class="btn-primary btn input-create-user" type="submit" id='create_user' value=''><span class="mr-2 material-symbols-outlined">save</span>Sauvegarder</button></div>
</div>
  <label for="lastname">Nom</label><br><input class="form-control" type="text" placeholder="Entrer le nom" name="lastname" required><br><br>
<label for="firstname">Prénom</label><br><input class="form-control" type="text" placeholder="Entrer le prénom" name="firstname" required><br><br>


        <label for="email">Identifiant</label><br>
 <input class="form-control" type="email" placeholder="Entrer votre email" name="email" required>
 <br><br>
    <label for="password">Mot de passe (Provisoire) <button type="button" class="btn-eye-user btn material-symbols-sharp btn-border-none" style="color: var(--color-primary);" onclick="togglePassword()">
                                <span class="material-symbols-outlined primary span-eye">
                                visibility_off
                                </span>
                                </button></label><br>
    <div>
    <input id="inputPassword" class="form-control" type="password" placeholder="Entrer le mot de passe" name="password" required>
    
                            </div>
    <br>
   <div class="oao-pwi-strength-indicator-container oao-pwi-state-not_applicable oao-pwi-si-warn-1">
    <span class="oao-pwi-strength-indicator-1"></span>
    <span class="oao-pwi-strength-indicator-2"></span>
    <span class="oao-pwi-strength-indicator-3"></span>
    <span class="oao-pwi-strength-indicator-4"></span>
    <span class="oao-pwi-strength-indicator-5"></span>
    <span class="oao-pwi-strength-indicator-6"></span>
    <span class="oao-pwi-strength-info">Ne convient pas </span></div>
    <br>
   <button id="generate" type="button" class="btn btn-sm btn-outline-primary rounded mt-3 mb-1">Génération de Mot de Passe</button><br>      
  <br> 
</form>
</div>
    <br>
</section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

    <script>
  // récupère le champ select et le div à afficher/masquer
  var select = document.getElementById('badgeuse_role');
  var divInput = document.getElementById('div_contract');
  var selects = divInput.querySelectorAll('select');
  var inputs = divInput.querySelectorAll('input');
        console.log(inputs);

  // fonction pour afficher ou masquer le div en fonction de la sélection
  function toggleDiv() {
    if (select.value  === 'user' || select.value === 'Utilisateur') {
        inputs.forEach(input => {
        input.disabled = false;
    })
    selects.forEach(select => {
        select.disabled = false;
    })
    } else {
        selects.forEach(select => {
        select.disabled = true;
    })
      inputs.forEach(input => {
        input.disabled = true;
    })
    }
  }
toggleDiv();

</script>
<script>
    $("#generate").click(function(){
        var randomstring = Math.random().toString(36).slice(-12);
        var caracteresSpeciaux = ["!", "@", "#", "$", "%", "^", "&", "*"]; 
        var randomCS = caracteresSpeciaux[Math.floor(Math.random() * caracteresSpeciaux.length)]
        var randomCS2 = caracteresSpeciaux[Math.floor(Math.random() * caracteresSpeciaux.length)]// Tableau de caractères spéciaux souhaités
randomstring = randomCS + randomstring + randomCS2; // Ajout d'un caractère spécial aléatoire à la chaîne générée







        $("#inputPassword").val(randomstring);
    })

    function togglePassword() {
        var spanEye = document.getElementsByClassName("span-eye")[0];
  if (spanEye.innerText === "visibility_off") {
    spanEye.innerText = "visibility";
  } else {
    spanEye.innerText = "visibility_off";
  }

        var passwordField = document.getElementById("inputPassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }




// mesurer la force du mdp
function strengthPwd(password) {
  var strength = 0;
  
  // Vérifier la longueur du mot de passe
  if (password.length >= 1) {
    strength += 0.5;
  }

  if (password.length >= 4) {
    strength += 0.5;
  }

  if (password.length >= 8) {
    strength += 1;
  }

  if (password.length >= 12) {
    strength += 1;
  }
  
  // Vérifier la présence de lettres majuscules et minuscules
  if (/[a-z]/.test(password) && /[A-Z]/.test(password) && password.length >= 6) {
    strength += 1;
  }
  
  // Vérifier la présence de chiffres
  if (/\d/.test(password) && password.length >= 6) {
    strength += 1;
  }
  
  // Vérifier la présence de caractères spéciaux
  if (/[!@#$%^&*]/.test(password) && password.length >= 6) {
    strength += 1;
  }
  
  return strength;
}

function displayStrength(password) {
  var strength = strengthPwd(password); 
  var strengthSpan1 = document.querySelector('.oao-pwi-strength-indicator-1')
  var strengthSpan2 = document.querySelector('.oao-pwi-strength-indicator-2')
  var strengthSpan3 = document.querySelector('.oao-pwi-strength-indicator-3')
  var strengthSpan4 = document.querySelector('.oao-pwi-strength-indicator-4')
  var strengthSpan5 = document.querySelector('.oao-pwi-strength-indicator-5')
  var strengthSpan6 = document.querySelector('.oao-pwi-strength-indicator-6')
  var strengthInfo = document.querySelector('.oao-pwi-strength-info')

  console.log('Force du mot de passe : ' + strength);
  if(strength == 0) {
    strengthInfo.textContent = 'Ne convient pas'
    strengthInfo.classList.add("danger");
    strengthInfo.classList.remove("warning");
    strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");
    strengthSpan2.classList.remove("red");
    strengthSpan1.classList.remove("red");
    strengthSpan1.classList.remove("orange");
    strengthSpan2.classList.remove("orange");
    strengthSpan3.classList.remove("orange");
    strengthSpan4.classList.remove("orange");

    strengthSpan1.classList.remove("red");
    strengthSpan2.classList.add("gray");
    strengthSpan3.classList.add("gray");
    strengthSpan4.classList.add("gray");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }

    if(strength == 0.5) {
    strengthInfo.textContent = 'Ne convient pas'
    strengthInfo.classList.add("danger");
    strengthInfo.classList.remove("warning");
    strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");
    strengthSpan2.classList.remove("red");
    strengthSpan1.classList.remove("red");
    strengthSpan1.classList.remove("orange");
    strengthSpan2.classList.remove("orange");
    strengthSpan3.classList.remove("orange");
    strengthSpan4.classList.remove("orange");

    strengthSpan1.classList.add("red");
    strengthSpan2.classList.add("gray");
    strengthSpan3.classList.add("gray");
    strengthSpan4.classList.add("gray");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }

  if(strength == 1) {
    strengthInfo.textContent = 'Ne convient pas'
    strengthInfo.classList.add("danger");
    strengthInfo.classList.remove("warning");

    strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");
    strengthSpan2.classList.remove("red");
    strengthSpan1.classList.remove("orange");
    strengthSpan2.classList.remove("orange");
    strengthSpan3.classList.remove("orange");
    strengthSpan4.classList.remove("orange");

    strengthSpan1.classList.add("red");
    strengthSpan2.classList.add("gray");
    strengthSpan3.classList.add("gray");
    strengthSpan4.classList.add("gray");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }
    if(strength == 2) {
        strengthInfo.textContent = 'Ne convient pas'
    strengthInfo.classList.add("danger");
    strengthInfo.classList.remove("warning");
    strengthInfo.classList.remove("success");

        strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");
    strengthSpan1.classList.remove("orange");
    strengthSpan2.classList.remove("orange");
    strengthSpan3.classList.remove("orange");
    strengthSpan4.classList.remove("orange");

    strengthSpan1.classList.add("red");
    strengthSpan2.classList.add("red");
    strengthSpan3.classList.add("gray");
    strengthSpan4.classList.add("gray");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }
    if(strength == 3) {
        strengthInfo.textContent = 'Faible'
    strengthInfo.classList.remove("danger");
    strengthInfo.classList.add("warning");

    strengthInfo.classList.remove("success");
    strengthSpan4.classList.remove("orange");
    strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");

    strengthSpan1.classList.add("orange");
    strengthSpan2.classList.add("orange");
    strengthSpan3.classList.add("orange");
    strengthSpan4.classList.add("gray");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }
    if(strength == 4) {
    strengthInfo.textContent = 'Faible'
    strengthInfo.classList.remove("danger");
    strengthInfo.classList.add("warning");

    strengthInfo.classList.remove("success");
    strengthSpan1.classList.remove("green");
    strengthSpan2.classList.remove("green");
    strengthSpan3.classList.remove("green");
    strengthSpan4.classList.remove("green");
    strengthSpan5.classList.remove("green");
    strengthSpan6.classList.remove("green");

    strengthSpan1.classList.add("orange");
    strengthSpan2.classList.add("orange");
    strengthSpan3.classList.add("orange");
    strengthSpan4.classList.add("orange");
    strengthSpan5.classList.add("gray");
    strengthSpan6.classList.add("gray");
    }
    if(strength == 5) {
        strengthInfo.textContent = 'Bon'
    strengthInfo.classList.remove("danger");
    strengthInfo.classList.remove("warning");
    strengthInfo.classList.add("success");

    strengthSpan6.classList.remove("green");

    strengthSpan1.classList.add("green");
    strengthSpan2.classList.add("green");
    strengthSpan3.classList.add("green");
    strengthSpan4.classList.add("green");
    strengthSpan5.classList.add("green");
    strengthSpan6.classList.add("gray");
    }
    if(strength == 6) {
        strengthInfo.textContent = 'Très bon'
    strengthInfo.classList.remove("danger");
    strengthInfo.classList.remove("warning");
    strengthInfo.classList.add("success");
    strengthSpan1.classList.add("green");
    strengthSpan2.classList.add("green");
    strengthSpan3.classList.add("green");
    strengthSpan4.classList.add("green");
    strengthSpan5.classList.add("green");
    strengthSpan6.classList.add("green");
    }
}

document.getElementById('generate').addEventListener('click', function() {

    password = document.getElementById('inputPassword').value;
    displayStrength(password);
})

document.getElementById('inputPassword').addEventListener('input', function() {
    password = this.value
    displayStrength(password);
  
});

</script>
</body>

</html>
<?php

} else
    header('Location: login.php');