<?php 

function delService($id) {
    include('config/env.php');
    $req = "DELETE FROM services where 
    id = '" . $id . "'";
    mysqli_query($db, $req);
}

$id_service= $_GET['id'];
delService($id_service);
header('Location: services.php');