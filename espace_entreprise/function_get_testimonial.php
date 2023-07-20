<?php 
function getTestimonial($id)
{
        include('config/env.php');
        $req = "SELECT * FROM testimonials where 
        id = '" . $id . "'";
        $exec_req = mysqli_query($db, $req);
        $rep = mysqli_fetch_array($exec_req);
        return $rep;
    }