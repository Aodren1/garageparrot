<?php 

function delUser($id){
    include('config/env.php');
    $req = "DELETE FROM users where 
    id = '" . $id . "'";
    mysqli_query($db, $req);
  }


