<?php 

function delCar($id) {
    include('config/env.php');
    $req = "DELETE FROM cars where 
    id = '" . $id . "'";
    mysqli_query($db, $req);
}

$id_car = $_GET['id'];
delCar($id_car);
header('Location: cars.php');