<?php
function editCar($id, $car)
{
//  $message = var_dump($_FILES) . var_dump($_POST);
include 'config/env.php';
$name = $_POST['name'];
$price = $_POST['price'];
$kilometer = $_POST['kilometers'];
$year = $_POST['year'];
$description = $_POST['description'];
$condition = $_POST['condition'];
$type = $_POST['type'];

    $selectedSettings = [];
for ($i = 1; $i <= 5; $i++) {
  $checkboxName = "setting" . $i;
  if (isset($_POST[$checkboxName])) {
    $selectedSettings[] = $_POST[$checkboxName];
  }
}
$selectedSettingsString = implode(',', $selectedSettings);
if ($selectedSettingsString == "") $selectedSettingsString = $car['setting'];




$selectedGear = [];
for ($i = 1; $i <= 4; $i++) {
  $checkboxName2 = "gear" . $i;

  if (isset($_POST[$checkboxName2])) {
    $selectedGear[] = $_POST[$checkboxName2];
  }
}
$selectedGearString = implode(', ', $selectedGear);
if ($selectedGearString == "") $selectedGearString = $car['gear'];


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
  
  } else $path = $car['image'];

    try {

        $sth = $dbco->prepare("UPDATE `cars` SET `name` = ?, `price` = ?, `kilometer` = ?, `setting` = ?, `year` = ?, `gear` = ?, `image` = ?, `description` = ?, `car_condition` = ?, `type` = ? WHERE `id` = ?");


        
        $sth->bindParam(1, $name, PDO::PARAM_STR);
        $sth->bindParam(2, $price, PDO::PARAM_INT);
        $sth->bindParam(3, $kilometer, PDO::PARAM_INT);
        $sth->bindParam(4, $selectedSettingsString, PDO::PARAM_STR);
        $sth->bindParam(5, $year, PDO::PARAM_STR);
        $sth->bindParam(6, $selectedGearString, PDO::PARAM_STR);
        $sth->bindParam(7, $path, PDO::PARAM_STR);
        $sth->bindParam(8, $description, PDO::PARAM_STR);
        $sth->bindParam(9, $condition, PDO::PARAM_STR);
        $sth->bindParam(10, $type, PDO::PARAM_STR);
        $sth->bindParam(11, $id, PDO::PARAM_INT);
        

        $sth->execute();

        $message = "<script> Alert.alert_info('Voiture mise à jour'); </script>";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
   }

    return $message;
}