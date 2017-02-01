<?php
require_once('inc/db.php');

//get slug
$a_id = $_GET['athlete'];
$e_date = $_GET['date'];

// Query


$sql = "SELECT * FROM athletes WHERE athletes.a_id=$a_id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

include("inc/header-detail.php");
?>

  <div class="add-workout">

    <h2>Add workout</h2>
    <p>
      Add a new workout for athlete <?php echo $row['a_name'] . ' on the ' . $e_date ?>
    </p>
      <form id="signup" action="inc/addworkoutto.php" method="POST">

        <label for="title">title</label><br>
        <input type="text" name="workout"><br>

        <label for="description">description</label><br>
        <textarea rows="4" cols="50" name="description"></textarea>

        <input type="hidden" name="athlete_id" value="<?php echo $a_id ?>">
        <input type="hidden" name="date" value="<?php echo $e_date ?>">
        <input type="hidden" name="done" value="<?php echo $done ?>">

        <br>

        <input type="submit" name="submit" value="Add">
      </form>
    </div><!-- End of add-workout -->

<?php include("inc/footer.php"); ?>
