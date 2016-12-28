<?php
require_once('inc/db.php');
$a_id = $_GET['athlete'];
// Query
$trainer_user = json_encode($_SESSION['userna']);
$sql = "SELECT * FROM athletes
LEFT JOIN exercises ON athletes.a_id=exercises.athleteID WHERE athletes.a_id=$a_id
";

$sql2 = "SELECT * FROM exercises
JOIN athletes ON exercises.athleteID=athletes.a_id WHERE athletes.a_id=$a_id
";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

$row = mysqli_fetch_assoc($result);

include("inc/header.php");
//Check if there's a session
if(isset($_SESSION['userna'])){
  echo "<div class='notification'>Welcome, " . $_SESSION['userna'].'</div>';

} else {
    header('Location: login.php');
    echo 'Session name: ' . $_SESSION['userna'];
}
//Include header.php

?>
    <a href="athletes.php">< back</a>
    <h2>Athlete: <?php echo $row['a_name'] ?></h2>

    <ul class="details">

      <li><?php echo 'Email: ' . $row['email']?></li>
      <li><?php echo 'Member since: ' . $row['a_date']?></li>

    </ul>

    <div class="list">

      <ul>
        <?php

              if ($result2->num_rows > 0) {

                  // output data of each row
                  while($a = $result2->fetch_assoc()) {
                    echo '<li><a href=workout-detail.php?workout=' . $a['e_id'] .'>' . $a['exercise']. '</a>';
                    echo '<p class="date"> ' . $a['e_date'] . ' <p>';
                    echo '</li>';
                  }
              } else {
                  echo "There are no workouts";
              }
              $conn->close();
              ?>
      </ul>

    </div>
    <a href="inc/logout.php" class="logout">Log Out</a>
<?php include("inc/footer.php"); ?>
