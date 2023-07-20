<?php

function setUser()
{
  
  include('config/env.php');
  include_once('function_hash.php');
    if (isset($_POST['email'])) {
    $email = $_POST['email'];
    include('function_email_already_exist.php');

    if (email_already_exist($email) == false) {
      
      $prenom = $_POST['firstname'];
      $nom = $_POST['lastname'];
      $pwd = $_POST['password'];
      $pwd = hash_pwd($pwd);
      $role = 'employee';

      try {

        $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sth = $dbco->prepare("
    INSERT INTO users (firstname, lastname, email, password, role)
    VALUES (:firstname, :lastname, :email, :password, :role) 
  ");
        $sth->bindParam(':firstname', $prenom);
        $sth->bindParam(':lastname', $nom);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':password', $pwd);
        $sth->bindParam(':role', $role);
        $sth->execute();
        $message = "<script> Alert.alert_info('Utilisateur créé'); </script>";

      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }
    } else{
    $message = "<script> Alert.alert_info('Erreur, le mail existe déjà'); </script>";
        return $message;
      }
      return $message;
  }
}
      