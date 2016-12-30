<?php
require_once('inc/db.php');

// Query

$sql = "SELECT * FROM trainers";

$result = mysqli_query($conn, $sql);
include("inc/header.php");
?>

  <div class="athletes-signup">

    <h2>Athletes - Sign Up</h2>
    <p>
      Enter your details to sign up.
    </p>
      <form id="signup" action="inc/signupto.php" method="POST">
        <label for="fullname">Full Name</label><br>
          <input type="text" name="name"><br>
        <label for="email">E-mail</label><br>
          <input type="text" name="email"><br>
        <label for="username">Username</label><br>
          <input type="text" name="username"><br>
        <label for="password">Password</label><br>
          <input type="password" name="password"><br>
            <label for="a_id">Select trainer</label><br>
          <input type="hidden" name="a_id" value="<?php echo $row['a_id'] ?>">
          <?php
                echo '<select name="trainer">';
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo '<option value='.$row[t_id].'>' . $row['t_name'] . '</option>';
                        //echo '<li>'.$row['t_name'].'</li>';

                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

                echo '</select>';
            ?>

          </select>

          <br>
        <input type="submit" name="submit" value="Sign Up">
      </form>
    </div><!-- End of athletes-signup -->

    <div class="trainers-signup">

      <h2>Trainers - Sign Up</h2>
      <p>
        Enter your details to sign up.
      </p>
        <form id="signup" action="inc/t_signupto.php" method="POST">
          <label for="name">Full Name</label><br>
            <input type="text" name="name"><br>
          <label for="email">E-mail</label><br>
            <input type="text" name="email"><br>
          <label for="username">Username</label><br>
            <input type="text" name="username"><br>
          <label for="password">Password</label><br>
            <input type="password" name="password"><br>

            <br>
          <input type="submit" name="submit" value="Sign Up">
        </form>
      </div><!-- End of athletes-signup -->
<?php include("inc/footer.php"); ?>
