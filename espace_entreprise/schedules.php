<?php
session_start();
include('head.php');
if ($_SESSION['garage'] == true ) {

    function swapSchedule($currentId, $newId)
    {
        include('config/env.php');
        $updateOldSchedule = $dbco->prepare("UPDATE schedules SET current = 'false' WHERE id = :currentId");
        $updateOldSchedule->bindParam(':currentId', $currentId);
        $updateOldSchedule->execute();

        $updateNewSchedule = $dbco->prepare("UPDATE schedules SET current = 'true' WHERE id = :newId");
        $updateNewSchedule->bindParam(':newId', $newId);
        $updateNewSchedule->execute();
        header('Location: schedules.php');
    }

    if ($_POST['newId'])  {
        swapSchedule($_POST['currentId'],$_POST['newId']);
        unset($_POST);
        include('config/env.php'); $sth = $dbco->query("SELECT * FROM schedules WHERE current = 'true'");
$result = $sth->fetch(PDO::FETCH_ASSOC);
$id_schedule_current = $result['id'];
    }

    if($_POST['del_schedule_id']) {
        include('function_delete_current_schedule.php');
        delCurrentSchedule($_POST['del_schedule_id']);
        setFirstScheduleAsCurrent();
        header('Location: schedules.php');
    }
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Horaires | Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,0,-25" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <!-- NAVIGATION -->
    <?php  include('header.php') ?>
    <!-- END NAVIGATION -->
    <!-- MAIN -->
    <main>

        <!-- MIDDLE -->
<section>

    <div class="container card-user-modif card-schedule-modif">
    <div class="header header-management mb-5">
                <h1 class="add-user-title main-title-page"><span style="font-size: 27px;" class=" material-symbols-sharp">schedule</span> <a>Horaires du garage</a></h1><br>
</div>
<div class="grid-schedule">
<div class="current-schedule m-3">
    <h2>Horaires actuelles</h2>
</div>
<div style="background-color: rgb(96 102 102 / 60%)!important" class="current-schedule m-3">
<h2>Options</h2>

</div>
<div style="background-color: rgb(96 102 102 / 60%)!important" class="current-schedule m-3">
<h2>Changement d'horaires</h2>
   
</div>
</div>
<div class="grid-schedule">
<div class="current-schedule">
    <?php include('config/env.php'); $sth = $dbco->query("SELECT * FROM schedules WHERE current = 'true'");
$result = $sth->fetch(PDO::FETCH_ASSOC);
$id_schedule_current = $result['id'];

    ?>
    <h3 class="mb-3"><?php echo $result['name'] ?></h3>
    <h5>Lundi</h5>
    <p><?php echo date('H\hi', strtotime($result['monday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['monday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['monday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['monday_eve_start']))  ?> </p>
    <h5>Mardi</h5>
    <p><?php echo date('H\hi', strtotime($result['tuesday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['tuesday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['tuesday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['tuesday_eve_start']))  ?> </p>
    <h5>Mercredi</h5>
    <p><?php echo date('H\hi', strtotime($result['wednesday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['wednesday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['wednesday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['wednesday_eve_start']))  ?> </p>
    <h5>Jeudi</h5>
    <p><?php echo date('H\hi', strtotime($result['thursday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['thursday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['thursday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['thursday_eve_start']))  ?> </p>
    <h5>Vendredi</h5>
    <p><?php echo date('H\hi', strtotime($result['friday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['friday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['friday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['friday_eve_start']))  ?> </p>
    <h5>Samedi</h5>
    <p><?php echo date('H\hi', strtotime($result['saturday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['saturday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['saturday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['saturday_eve_start']))  ?> </p>
    <h5>Dimanche</h5>
    <p><?php echo date('H\hi', strtotime($result['sunday_mor_start']))  ?> - <?php echo date('H\hi', strtotime($result['sunday_mor_end']))  ?>  / <?php echo date('H\hi', strtotime($result['sunday_eve_start']))  ?>  - <?php echo date('H\hi', strtotime($result['sunday_eve_start']))  ?> </p>

</div>
<div class="option-schedule p-5">
<button class="btn btn-primary"><a href="create_schedule.php">Créer de nouvelles horaires</a></button><br>
    <button class="btn btn-primary"><a href="edit_schedule.php?id=<?php echo $id_schedule_current ?>">Modifier les horaires</a></button><br>
    <form action="" method="post">
  <input type="hidden" name="del_schedule_id" value="<?php echo $id_schedule_current ?>">
  <button class="btn btn-primary" type="submit">Supprimer ces horaires</button>
</form>
<br>
</div>
<div class="list-schedule">
    <?php $sth = $dbco->query("SELECT * FROM schedules");
$result2 = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result2 as $row) {
    ?>
          <form action="schedules.php" method="post">
            <input type="hidden" name="currentId" value="<?php echo $id_schedule_current; ?>">
            <input type="hidden" name="newId" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-primary"><?php echo $row['name']; ?></button>
        </form>
        <br>
    
    
<?php
}
 ?>
</div>
</div>
    </div>
</section>
        <!-- END MIDDLE -->

    </main>
    <!-- END OF MAIN -->

</body>

</html>
<?php

} else
    header('Location: login.php');