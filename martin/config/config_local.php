<?php 



ob_start(); //Turn on output buffering

session_start();

include 'constants.php';

date_default_timezone_set("Europe/Amsterdam");

  // Create db connection


if(mysqli_connect_errno()){

  echo "Failed to connect: " . mysqli_connect_errno();

}

?>