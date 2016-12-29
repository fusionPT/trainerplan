<?php
require_once('inc/db.php');

// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM trainers
JOIN athletes ON athletes.trainerID=trainers.t_id WHERE trainers.username=$trainer_user";

$result = mysqli_query($conn, $sql);


//Check if there's a session
if(isset($_SESSION['userna'])){
  echo "<div class='notification'>Welcome, " . $_SESSION['userna'].'</div>';

} else {
    header('Location: login.php');
    echo 'Session name: ' . $_SESSION['userna'];
}
//Include header.php


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Trainer Plan</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
    <ul class="list">
      <h2>Your Athletes</h2>
    <?php

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<p class="date"> ' . $row['e_date'] . ' <p>';
                echo '<p class="date"> ' . $row['email'] . ' <p>';
                echo '<p><a href=athletes-detail.php?athlete=' .$row['a_id']. '>' . $row['a_name'] . '</a><p>';
                echo '</li>';
              }
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>
    </ul><!-- end of list -->
    <a href="inc/logout.php" class="logout">Log Out</a>
<?php include("inc/footer.php"); ?>
