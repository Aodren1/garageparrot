<?php 

function delCurrentSchedule($id){
    include('config/env.php');
    $req = "DELETE FROM schedules where 
    id = '" . $id . "'";
    mysqli_query($db, $req);
  }


  function setFirstScheduleAsCurrent()
  {
    include('config/env.php');
  
      try {
          $dbco->exec("UPDATE `schedules` SET `current` = 'false'");
  
          $stmt = $dbco->query("SELECT * FROM `schedules` LIMIT 1");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
          if ($row) {
              $sth = $dbco->prepare("UPDATE `schedules` SET `current` = 'true' WHERE `id` = ?");
              $sth->bindParam(1, $row['id']);
              $sth->execute();
          }
      } catch (PDOException $e) {
          $message = "Erreur : " . $e->getMessage();
      }
  
      return $message;
  }