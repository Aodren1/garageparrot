<?php


function sendTestimonial()
{
  include('espace_entreprise/config/env.php');
  $message = $_POST['message'];
$message = trim($message);
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
$job = $_POST['job'];
$job = trim($job);
$job = htmlspecialchars($job, ENT_QUOTES, 'UTF-8');
$name = $_POST['name'];
$name = trim($name);
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$current = 'inactif';
      try {

        $sth = $dbco->prepare("
    INSERT INTO testimonials (name, job, message, current)
    VALUES (:name, :job, :message, :current) 
  ");
        $sth->bindParam(':name', $name);
        $sth->bindParam(':job', $job);
        $sth->bindParam(':message', $message);
        $sth->bindParam(':current', $current);
        $sth->execute();
        $message = "<script> Alert.alert_info('Message envoyé'); </script>";

      } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
      }
      unset($_POST);
 return $message;
      
}