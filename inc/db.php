<?php
session_start();
//$user = json_encode($_SESSION['userna']);

$servername = parse_url(getenv("mysql://bc6ecc5d7c3590:4bad3a87@eu-cdbr-west-01.cleardb.com/heroku_7f3212703661806?reconnect=true"));
$username = "bc6ecc5d7c3590";
$password = "4bad3a87";
$dbname = "heroku_7f3212703661806";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
