<?php

  $userid = json_encode($_POST['username']);
  $pass = json_encode($_POST['password']);

  require_once('db.php');

  $sql = "SELECT * FROM trainers WHERE username=$userid AND password=$pass";
  $result = mysqli_query($conn, $sql);


  if($row = $result->fetch_assoc()) {
    $_SESSION['userna'] = $row['username'];
    //session_start();
    header('Location: ../athletes.php');
    echo 'Welcome, ' . $_SESSION['userna'];

  } else {
    echo "Wrong user or password!";
  }

  mysqli_close($conn);

  ?>
