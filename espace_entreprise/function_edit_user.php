<?php

if ($_SESSION['garage'] == true) {
function editUser($email_id,$get_email)
    { 
        // $message = var_dump($_POST);
        // return $message;
  if (isset($_POST['email'])) {

    $email = $_POST['email'];   
    include_once('function_email_already_exist.php');
    echo 1;
    email_already_exist($email);
    if (email_already_exist($email) == true && $email != $get_email) {
      $message = "<script> Alert.alert_info('l\'email existe déjà'); </script>";
      return $message;
      } else {
        include_once('function_hash.php');

        $prenom = $_POST['firstname'];
        $nom = $_POST['lastname'];

        if (isset($_POST['password'])) {
          $pwd = $_POST['password'];
          $pwd = hash_pwd($pwd);

        } else
          $pwd = "93174d58257b2527831456c83e21ca7eefa94d29df0f02fa5f69d8eb362ae5b7";
          if(($_POST['password'] != $_POST['pwd_confirm']) && isset($_POST['pwd_confirm']) && $_POST['pwd_confirm'] != ""){
            $message = "<div class='alert alert-danger'>Les mots de passe sont différents</div>";
            return $message;
          }else {  
        try {
          include('config/env.php');


          if ($prenom != "") {
            $sth = $dbco->prepare("
                  UPDATE users
                  SET firstname = '$prenom'
                  WHERE id='$email_id'
                ");
            $sth->execute();
          }

          ////////////////////////////////////////////////////////////////////

          if ($nom != "") {

            $sth1 = $dbco->prepare("
                UPDATE users
                SET lastname = '$nom'
                WHERE id='$email_id'
              ");
            $sth1->execute();



          }

          //////////////////////////////////////////////////////////////////////

          if ($email != "") {
            $sth2 = $dbco->prepare("
                UPDATE users
                SET email = '$email'
                WHERE id='$email_id'
              ");
            $sth2->execute();
            

            ////////////////////////////////////////////////////////////////////////

          }

          if ($pwd != "93174d58257b2527831456c83e21ca7eefa94d29df0f02fa5f69d8eb362ae5b7") {

            $sth4 = $dbco->prepare("
                UPDATE users
                SET password = '$pwd'
                WHERE id='$email_id'
              ");
            $sth4->execute();

          }


          //////////////////////////////////////////////////////////////////////////////




      $message = "<script> Alert.alert_info('Utilisateur édité'); </script>";

          return $message;


        } catch (PDOException $e) {
      $message = "<script> Alert.alert_info('Erreur : " . $e->getMessage() . "'); </script>";
          return $message;
        }
      return $message;
      }
    }
}
     }




}