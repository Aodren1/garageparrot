<?php
function connect() {
    $servername = "db5013745847.hosting-data.io";
    $username = "dbu393816";
    $password = "Ecfgarage789";
    $dbName = "dbs11507124";
    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbName.';charset=utf8', $username, $password);
    if($pdo){
        //make errors throw exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }else{
        die("Could not create PDO connection.");
    }
}

$sql = connect();
