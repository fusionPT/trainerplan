<?php
//db connection
//db connection
require_once('inc/db.php');
include('inc/functions.php');
checkSession('userna');

// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM trainers
JOIN athletes ON athletes.trainerID=trainers.t_id WHERE trainers.username=$trainer_user";


$result = mysqli_query($conn, $sql);
$pageTitle = "index";
include('inc/header.php');
?>

<?php include("inc/footer.php"); ?>
