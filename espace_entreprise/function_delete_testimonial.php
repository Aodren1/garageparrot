<?php 

function delTestimonial($id) {
    include('config/env.php');
    $req = "DELETE FROM testimonials where 
    id = '" . $id . "'";
    mysqli_query($db, $req);
}

$id_testimonial= $_GET['id'];
delTestimonial($id_testimonial);
header('Location: testimonials.php');