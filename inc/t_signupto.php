<?php

$usern = json_encode($_POST['username']);
$pwd = json_encode($_POST['password']);
$name = json_encode($_POST['name']);
$email = json_encode($_POST['email']);
$created = json_encode(date("Y-m-d H:i:s"));

require_once('db.php');

$sql = "INSERT INTO trainers (t_name, username, password, email, date)
VALUES ($name, $usern, $pwd, $email, $created)";

if (mysqli_query($conn, $sql)) {
    header('Location:'. ' ../login.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
