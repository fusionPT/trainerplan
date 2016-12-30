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
$pageTitle = "athletes";
include('inc/header.php');
?>

    <ul class="list">
      <h2>Your Athletes</h2>
    <?php

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<p class="date"> ' . $row['a_date'] . ' <p>';
                //echo '<p class="date"> ' . $row['email'] . ' <p>';
                echo '<p><img class="avatar" src="images/avatar.png" alt="avatar" /><a href=athletes-detail.php?athlete=' .$row['a_id']. '>' . $row['a_name'] . '</a><p>';
                echo '</li>';
              }
          } else {
              echo "You have no athletes yet. Invite some.";
          }
          $conn->close();
          ?>
    </ul>

<?php include("inc/footer.php"); ?>
