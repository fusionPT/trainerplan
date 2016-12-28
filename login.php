<?php
require_once('inc/db.php');
include("inc/header.php");

if(isset($_SESSION['userna'])){
    echo "<div class='notification'>You are already logged in! Go to your <a href='index.php'>dashboard</a></div>";
  } else {
    echo "<p class='notification'>Please log in or <a href='signup.php'>Sign Up</a></p>";
  }
?>

    <div class="content">

    <h2>Trainers - Log In</h2>
    <p>
      Enter your details to sign up.
    </p>
      <form id="login" action="inc/loginto.php" method="POST">
        <label for="username">Username</label>
          <input type="text" name="username"><br>
        <label for="password">Password</label>
          <input type="password" name="password">
          <br>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
<?php include("inc/footer.php"); ?>
