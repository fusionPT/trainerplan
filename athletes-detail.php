<?php
//db connection
require_once('inc/db.php');
//import functions.php
require_once('inc/functions.php');

//get slug
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


checkSession('userna');
$pageTitle = "athletes-detail";
include("inc/header-detail.php");
?>

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

    </div><!-- End of list -->

<?php include("inc/footer.php"); ?>
