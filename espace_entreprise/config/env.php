<?php 

$servername = "db5013745847.hosting-data.io";
$username = "dbu393816";
$password = "Ecfgarage789";
$dbName = "dbs11507124";
$db = mysqli_connect($servername, $username, $password, $dbName)
    or die('could not connect to database');
    $dbco = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);