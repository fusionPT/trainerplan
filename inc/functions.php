<?php

function checkSession($session_name){
  if(isset($_SESSION[$session_name])){
    echo "Welcome, " . $_SESSION[$session_name];

  } else {
      header('Location: login.php');
      echo 'Log In';
  }
}
