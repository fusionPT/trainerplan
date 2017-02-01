<?php

$a_id = $_POST['athlete_id'];
$workout = json_encode($_POST['workout']);
$description = json_encode($_POST['description']);
$e_date = json_encode($_POST['date']);
$done = json_encode($_POST['done']);


require_once('db.php');

$sql = "INSERT INTO exercises (athleteID, exercise, description, e_date, done)
VALUES ($a_id, $workout, $description, $e_date, $done)";

if (mysqli_query($conn, $sql)) {
    header('Location:'. ' ../athletes-detail.php'.'?athlete='.$a_id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
