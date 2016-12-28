<?php

$usern = json_encode($_POST['username']);
$pwd = json_encode($_POST['password']);
$a_name = json_encode($_POST['name']);
$email = json_encode($_POST['email']);
$created = json_encode(date("Y-m-d H:i:s"));
$trainer = json_encode($_POST['trainer']);
$user_id = $_POST['a_id'];

require_once('db.php');

$sql = "INSERT INTO athletes (trainerID, username, password, a_name, email, a_date)
VALUES ($trainer, $usern, $pwd, $a_name, $email, $created)";

if (mysqli_query($conn, $sql)) {
    header('Location:'. ' ../athlete.php'.'?user='.$user_id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
