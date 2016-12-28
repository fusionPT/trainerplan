<?php
require_once('inc/db.php');

$user = $_GET['user'];
//Check if there's a session
if(isset($_SESSION['usern'])){
  header('Location: index.php');
  //echo "<p class='notification'>Welcome, " . $_SESSION['userna'].'</p>';
} else {
    header('Location: login.php');
}
// Query

$sql = "SELECT * FROM trainers
JOIN athletes ON athletes.trainerID=trainers.t_id
JOIN exercises ON exercises.athleteID=athletes.a_id WHERE athletes.a_id = $user ORDER BY exercises.e_date";

$result = mysqli_query($conn, $sql);


$athleteName = mysqli_query($conn, $sql);
$i = mysqli_fetch_assoc($athleteName);
$a_name = $i['a_name'];

include("inc/header.php");

?>

    <ul class="list">

    <?php
          echo '<h1>'. $a_name .'</h1>';
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo '<li>' . $row['exercise'];
                  echo '<p class="trainer">' . $row['t_name'] . '<p>';
                  echo '<p class="date">' . $row['e_date'] . '<p>';
                  echo '</li>';
              }
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>
    </ul>
<?php include("inc/footer.php"); ?>
