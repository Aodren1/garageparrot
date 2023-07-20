<?php 
function getUser($email_id)
{
        include('config/env.php');
        $req = "SELECT * FROM users where 
        id = '" . $email_id . "'";
        $exec_req = mysqli_query($db, $req);
        $rep = mysqli_fetch_array($exec_req);
        return $rep;
    }