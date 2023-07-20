<?php
//dans ce fichier on verifiie si le user existe dans la db workspace 
//et on le connecte au garage ensuite

include('function_hash.php');

session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {

  include ('config/env.php');
  $name = NULL;
  $mail = $_POST['email'];
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
  $pass = hash_pwd($password);


  if ($email !== "" && $password !== "") {
    
       // on regarde si le mail et le pwd existe dans la db coté users
      $requete = "SELECT count(*) FROM users where 
      email = '" . $email . "' and password = '" . $pass . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      // on recupere le name du user dans la db
      $req = "SELECT * FROM users where 
      email = '" . $email . "'";
      $exec_req = mysqli_query($db, $req);
      $rep = mysqli_fetch_array($exec_req);
      $name = $rep['firstname'];
      $lastname = $rep['lastname'];
      $email_id = $rep['id'];
      $role = $rep['role'];

      $req2 = "SELECT * FROM status where id = 1";
      $exec_req2 = mysqli_query($db, $req2);
      $rep2 = mysqli_fetch_array($exec_req2);
    // on lui attribue ses coordonées
    if ($count != 0) {
      $_SESSION['email'] = $email;
      $_SESSION['firstname'] = $name;
      $_SESSION['lastname'] = $lastname;
      $_SESSION['email_id'] = $email_id;
      $_SESSION['garage_role'] = $role;
      $_SESSION['garage'] = true;
      $_SESSION['garage_status'] = $rep2;
     
   
      if ($_SESSION['garage_role'] == 'admin' || $_SESSION['garage_role'] == 'employee') {
       header('Location: compagny_index.php');
      } else header('Location: login.php?erreur=1');
    } else {
      header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} else {
  header('Location: login.php');
}
mysqli_close($db); // fermer la connexion

