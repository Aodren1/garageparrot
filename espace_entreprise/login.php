<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Parrot | Connexion</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
</head>

<body>
    <section>
        <!-- Image de Connexion -->
        <div class="img">
            <img src="assets/img/bg.png">
        </div>
        <!-- Formulaire de Connexion -->
        <div class="content">
            <div class="form">
               <div class="logo">
                    <img src="assets/img/logo.png">
                </div>
                <h2>Connexion Garage Parrot</h2>
                <?php
                    if(isset($_SESSION))
                    {
                        session_destroy(); // on remet les sessions à 0
                    }
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "<div class='alert alert-danger'>Utilisateur ou mot de passe incorrect</div>";
            } if(isset($_GET['logout']))
            {
                $logout = $_GET['logout'];
                if ($logout == 1)
                    echo "<div class='alert alert-info'>Vous venez de vous déconnecter</div>";
                else if($logout == 2)  echo "<div class='alert alert-info'>Vous êtes déconnecté suite à un période d'innactivité</div>";

                }
            ?>
                <form action="conn_garage.php" method="POST">
                    <div class="input">
                        <span>Email de Connexion</span>
                        <input type="text" name="email" placeholder="......@garageparrot.fr">
                    </div>
                    <div class="input">
                        <span>Mot de Passe</span>
                        <input type="password" name="password" placeholder="°°°°°°°°°°">
                    </div>
                    <div class="input">
                        <input type="submit" value="Connexion" name="connexion">
                    </div>
                    <!-- <div class="input">
                        <p>Reinitialisation <a href="reset_password.php"> de mot de passe ?</a></p>
                    </div> -->
                </form>
            </div>
        </div>
    </section>
</body>

</html>
            