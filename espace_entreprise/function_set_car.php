<?php


function setCar()
{
  include('config/env.php');

  $selectedSettings = [];
for ($i = 1; $i <= 5; $i++) {
  $checkboxName = "setting" . $i;
  if (isset($_POST[$checkboxName])) {
    $selectedSettings[] = $_POST[$checkboxName];
  }
}
$selectedSettingsString = implode(',', $selectedSettings);

$selectedGear = [];

for ($i = 1; $i <= 4; $i++) {
  $checkboxName2 = "gear" . $i;

  if (isset($_POST[$checkboxName2])) {
    $selectedGear[] = $_POST[$checkboxName2];
  }
}
$selectedGearString = implode(', ', $selectedGear);


  if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)

  {
  
  
          if ($_FILES['image']['size'] <= 100000000)
  
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
  
  } else $message = 'error file' . var_dump($_FILES);

      try {

        $sth = $dbco->prepare("
    INSERT INTO cars (name, price, kilometer, setting, year, gear, image, car_condition, type)
    VALUES (:name, :price, :kilometer, :setting, :year, :gear, :image, :car_condition, :type) 
  ");
        $sth->bindParam(':name', $_POST['name']);
        $sth->bindParam(':price', $_POST['price']);
        $sth->bindParam(':kilometer', $_POST['kilometers']);
        $sth->bindParam(':setting', $selectedSettingsString);
        $sth->bindParam(':year', $_POST['year']);
        $sth->bindParam(':gear', $selectedGearString);
        $sth->bindParam(':image', $path);
        $sth->bindParam(':car_condition', $_POST['condition']);
        $sth->bindParam(':type', $_POST['type']);
        $sth->execute();
        $message = "<script> Alert.alert_info('Voiture créé'); </script>";

      } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
      }
 return $message;
      
}


