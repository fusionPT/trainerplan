<?php
//db connection
require_once('inc/db.php');
//import functions.php
require_once('inc/functions.php');

//Include header.php
include("inc/header.php");

// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM trainers
JOIN athletes ON athletes.trainerID=trainers.t_id WHERE trainers.username=$trainer_user";

$result = mysqli_query($conn, $sql);

?>


    <a href="inc/logout.php">Log Out</a>
<?php include("inc/footer.php"); ?>
