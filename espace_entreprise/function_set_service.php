<?php


function setService()
{
  include('config/env.php');

  if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)

  {
  
  
          if ($_FILES['image']['size'] <= 1000000)
  
          {
  
  
                  $infosfichier = pathinfo($_FILES['image']['name']);
  
                  $extension_upload = $infosfichier['extension'];
  
                  $extensions_autorisees = array('apng','APNG', 'pjpeg', 'PJPEG', 'svg', 'SVG', 'webp', 'WEBP', 'pjp', 'PJP', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'pdf', 'PDF', 'md', 'txt');
  
                  if (in_array($extension_upload, $extensions_autorisees))
  
                  {
                    $rand = rand(1,10000000);
          $path = 'uploads/' . $_POST['name'] . $rand . '_' . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],'uploads/' . $_POST['name'] . basename( $rand . '_' . $_FILES['image']['name']));
  
                  }
  
          }
  
  } else $message = "Alert.alert_info('Error File'); </script>";

      try {

        $sth = $dbco->prepare("
    INSERT INTO services (title, description1, description2, description3, link, image, icon)
    VALUES (?, ?, ?, ?, ?, ?, ?) 
  ");
        $sth->bindParam(1, $_POST['title']);
        $sth->bindParam(2, $_POST['description1']);
        $sth->bindParam(3, $_POST['description2']);
        $sth->bindParam(4, $_POST['description3']);
        $sth->bindParam(5, $_POST['link']);
        $sth->bindParam(6, $path);
        $sth->bindParam(7, $_POST['icon']);
        $sth->execute();
        $message = "<script> Alert.alert_info('Service créé'); </script>";

      } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
      }
 return $message;
      
}


