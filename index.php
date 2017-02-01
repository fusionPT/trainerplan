<?php
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

if(isset($_SESSION['userna'])){
  echo '<p>You are already logged in. <a  href="athletes.php">Enter your account.</a></p>';
  echo '<p><a href="login.php">Log in</a> or <a href="signup.php">Sign Up</a></p>';
} else {
  echo '<p><a href="login.php">Log in</a> or <a href="signup.php">Sign Up</a></p>';
}

?>
<?php include("inc/footer.php"); ?>
