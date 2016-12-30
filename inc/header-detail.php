<?php
if(isset($_SESSION['userna'])){
  $user_msg = 'Welcome, ' . $_SESSION['userna'];
} else {
  $user_msg = 'Please <a href="login.php">log in</a>';
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="<?php echo $pageTitle ?>">
    <header>

      <h1>TrainerPlan</h1>
      <ul class="user">
        <li><a href="#" class="notification">Notification</a></li>
        <li><a href="inc/logout.php">Log Out</a></li>
        <li><?php echo $user_msg ?></li>
      </ul>

    </header>
    <div class="main-container">

      <div class="user-bar">

        <div class="user-details">
          <a class="back" href="javascript:history.go(-1)">Go Back</a>
          <img class="avatar" src="images/avatar.png" alt="avatar" />
          <h3><?php echo $row['a_name'] ?></h3>
        </div><!-- End of user-details -->

        <ul class="user-menu">
          <li><a href="#">Workout Plan</a></li>
          <li><a href="#">Profile</a></li>
        </ul>

      </div><!-- End of user-bar -->



      <div class="container">
