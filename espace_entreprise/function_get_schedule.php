<?php

function getSchedule($schedule_id_edit) {

    include('config/env.php');
    $query = "SELECT * FROM schedules WHERE id = :scheduleId";
    $stmt = $dbco->prepare($query);
    $stmt->bindParam(':scheduleId', $schedule_id_edit);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}