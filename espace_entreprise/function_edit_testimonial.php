<?php
function editTestimonial($id)
{
    // $message = var_dump($_POST);
include 'config/env.php';
$name = $_POST['name'];
$job = $_POST['job'];
$message = $_POST['message'];
$current = $_POST['current'];

    try {

        $sth = $dbco->prepare("UPDATE `testimonials` SET `name` = ?, `job` = ?, `message` = ?, `current` = ? WHERE `id` = ?");


        
        $sth->bindParam(1, $name, PDO::PARAM_STR);
        $sth->bindParam(2, $job, PDO::PARAM_STR);
        $sth->bindParam(3, $message, PDO::PARAM_STR);
        $sth->bindParam(4, $current, PDO::PARAM_STR);
        $sth->bindParam(5, $id, PDO::PARAM_INT);
        

        $sth->execute();

        $message = "<script> Alert.alert_info('Avis mis à jour'); </script>";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
   }

    return $message;
}