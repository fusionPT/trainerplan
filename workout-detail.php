<?php
require_once('inc/db.php');
$w_id = $_GET['workout'];
// Query
$trainer_user = json_encode($_SESSION['userna']);

$sql = "SELECT * FROM exercises
LEFT JOIN athletes ON exercises.athleteID=athletes.a_id WHERE exercises.e_id=$w_id
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//Include header.php
include("inc/header.php");
//Check if there's a session
if(isset($_SESSION['userna'])){
  echo "<div class='notification'>Welcome, " . $_SESSION['userna'].'</div>';

} else {
    header('Location: login.php');
    echo 'Session name: ' . $_SESSION['userna'];
}

?>
    <a href="javascript:history.go(-1)">< Back</a>
    <h2>Athlete: <?php echo $row['a_name'] ?></h2>

    <ul class="workout">

      <li><h3><?php echo $row['exercise']?></h3></li>
      <li><p><?php echo $row['description']?></p></li>
      <li><p class="date"><?php echo $row['e_date']?></p></li>

    </ul>

    <a href="inc/logout.php" class="logout">Log Out</a>
<?php include("inc/footer.php"); ?>
