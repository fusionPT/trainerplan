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
      <a href="/trainerplan-app/athletes.php"><h1>TrainerPlan</h1></a>
      <ul class="user">
        <li><a href="#" class="notification">Notification</a></li>
        <li><a href="inc/logout.php">Log Out</a></li>
        <li><?php echo $user_msg ?></li>
      </ul>
    </header>
    <div class="main-container">
      <div class="container">
