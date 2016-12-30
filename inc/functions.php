<?php
function checkSession($session_name){
  if(isset($_SESSION[$session_name])){

    //echo "Welcome, " . $_SESSION[$session_name];
    session_start();

  } else {
      //echo 'Not logged in';

      header('Location: login.php');

  }
}
