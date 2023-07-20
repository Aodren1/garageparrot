<?php 
function getCar($id)
{
        include('config/env.php');
        $req = "SELECT * FROM cars where 
        id = '" . $id . "'";
        $exec_req = mysqli_query($db, $req);
        $rep = mysqli_fetch_array($exec_req);
        return $rep;
    }