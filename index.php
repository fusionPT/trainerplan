<?php
require_once('inc/db.php');

// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM trainers
JOIN athletes ON athletes.trainerID=trainers.t_id WHERE trainers.username=$trainer_user";

$result = mysqli_query($conn, $sql);


//Check if there's a session
if(isset($_SESSION['userna'])){
  echo "<p class='notification'>Welcome, " . $_SESSION['userna'].'</p>';

} else {
    header('Location: login.php');
    echo 'Session name: ' . $_SESSION['userna'];
}
//Include header.php
include("inc/header.php");

?>


    <a href="inc/logout.php">Log Out</a>
<?php include("inc/footer.php"); ?>
