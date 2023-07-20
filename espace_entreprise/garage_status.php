<?php
session_start();

if ($_SESSION['garage'] == true) {
include_once ('config/env.php');
if ($_SESSION['garage_status'][2] == 1) {
    $requete = "UPDATE status
    SET status = 0, name = 'FERMÉ'
    WHERE id = 1;
    ";
    $exec_requete = mysqli_query($db, $requete);
    $_SESSION['garage_status'][2] = '0';
    $_SESSION['garage_status'][1] = 'FERMÉ';
    ob_start(); // Activer la mise en tampon de sortie
    header('Location: compagny_index.php');
    ob_end_flush(); 
} elseif ($_SESSION['garage_status'][2] == 0) {
    $requete = "UPDATE status
    SET status = 1, name = 'OUVERT'
    WHERE id = 1;
    ";
    $exec_requete = mysqli_query($db, $requete);
    $_SESSION['garage_status'][2] = '1';
    $_SESSION['garage_status'][1] = 'OUVERT';
    ob_start(); // Activer la mise en tampon de sortie
    header('Location: compagny_index.php');
    ob_end_flush(); 
}

}