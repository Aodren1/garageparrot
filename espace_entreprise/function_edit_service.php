<?php
function editService($id, $service)
{
include 'config/env.php';
$title = $_POST['title'];
$description1 = $_POST['description1'];
$description2 = $_POST['description2'];
$description3 = $_POST['description3'];
$icon = $_POST['icon'];
$link = $_POST['link'];


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
  
  } else $path = $service['image'];

    try {

        $sth = $dbco->prepare("UPDATE `services` SET `title` = ?, `description1` = ?, `description2` = ?, `description3` = ?, `link` = ?, `image` = ?, `icon` = ? WHERE `id` = ?");


        
        $sth->bindParam(1, $title, PDO::PARAM_STR);
        $sth->bindParam(2, $description1, PDO::PARAM_STR);
        $sth->bindParam(3, $description2, PDO::PARAM_STR);
        $sth->bindParam(4, $description3, PDO::PARAM_STR);
        $sth->bindParam(5, $link, PDO::PARAM_STR);
        $sth->bindParam(6, $path, PDO::PARAM_STR);
        $sth->bindParam(7, $icon, PDO::PARAM_STR);
        $sth->bindParam(8, $id, PDO::PARAM_INT);
        

        $sth->execute();

        $message = "<script> Alert.alert_info('Service mis à jour'); </script>";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }

    return $message;
}