<?php

//db connection
require_once('inc/db.php');
//import functions.php
require_once('inc/functions.php');

//Include header.php
include("inc/header.php");
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
